<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\School;
use App\Area;
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

        if (!empty($keyword)) {
            $school = School::where('name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('thana', 'LIKE', "%$keyword%")
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
        $areas=Area::get()->pluck('thana','thana');
        return view('admin.school.create', compact('areas'));
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
        
        $requestData = $request->all();
        
        School::create($requestData);

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

        return view('admin.school.edit', compact('school', 'areas'));
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
