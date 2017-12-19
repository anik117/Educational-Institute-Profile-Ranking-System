<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\School;
use App\Area;
use App\User;
use App\Headmaster;
use App\AreaHead;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (auth()->user()->hasRole('ah')) {
            $areaIds = AreaHead::where('user_id', auth()->user()->id)->pluck('area_id');
            $school = School::whereIn('area_id', $areaIds)->paginate($perPage);
            return view('admin.school.index', compact('school'));
        }

        if (!empty($keyword)) {
            $school = School::where('name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                // ->orWhere('thana', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $school = School::paginate($perPage);
        }

        return view('admin.school.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $areas = Area::get()->pluck('thana','id');
        $headmasters = User::role('hm')->get()->pluck('name', 'id'); 
        return view('admin.school.create', compact('areas','headmasters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $school = $request->validate([
          'name' => 'required|string',
          'code'=> 'required|numeric|digits:5',
          'website'=> 'url',
          'email'=> 'required|string|email|max:255|unique:users',
          'phone'=> 'required|digits:11|regex:/^(?:\+?88)?01[15-9]\d{8}$/',
        ]);

        $school = new School;
        $school->name = $request->name;
        $school->code = $request->code;
        $school->website = $request->website;
        $school->email = $request->email;
        $school->phone = $request->phone;
        $school->area_id = $request->area;
        $school->save();

        $headmaster = new Headmaster;
        $headmaster->user_id = $request->headmaster;
        $headmaster->school_id = $school->id;
        $headmaster->save();

        return redirect('admin/school')->with('flash_message', 'School added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return view('admin.school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        $areas=Area::get()->pluck('thana','thana');
        $headmasters = User::role('hm')->get()->pluck('name', 'id');

        return view('admin.school.edit', compact('school', 'areas', 'headmasters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $school = School::findOrFail($id);
        $school->update($requestData);

        return redirect('admin/school')->with('flash_message', 'School updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        School::destroy($id);

        return redirect('admin/school')->with('flash_message', 'School deleted!');
    }
}
