<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;
use App\User;
use App\AreaHead;
use Illuminate\Http\Request;

class AreaController extends Controller
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
            $area = Area::where('district', 'LIKE', "%$keyword%")
                ->orWhere('thana', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $area = Area::paginate($perPage);
        }

        return view('admin.area.index', compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ah = User::role('ah')->get()->pluck('name','id');
        return view('admin.area.create', compact('ah'));
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
        
        $area = new Area;
        $area->district = $request->district;
        $area->thana = $request->thana;
        $area->save();

        $areahead = new AreaHead;
        $areahead->user_id = $request->ah;
        $areahead->area_id = $area->id;

        $areahead->save();

        return redirect('admin/area')->with('flash_message', 'Area added!');
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
        $area = Area::findOrFail($id);
        return view('admin.area.show', compact('area'));
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
        $area = Area::where('id', $id)->get()->first();
        $ah = AreaHead::where('area_id', $id)->first()->user;
        $ah = $ah->pluck('name','id');
        return view('admin.area.edit', compact('area', 'ah'));
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
        
        $area = Area::where('id', $id)->get()->first();
        $area->district = $request->district;
        $area->thana = $request->thana;
        $area->save();

        $areahead = AreaHead::where('area_id', $id)->first();
        $areahead->user_id = $request->ah;
        $areahead->save();

        return redirect('admin/area')->with('flash_message', 'Area updated!');
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
        Area::destroy($id);

        return redirect('admin/area')->with('flash_message', 'Area deleted!');
    }
}
