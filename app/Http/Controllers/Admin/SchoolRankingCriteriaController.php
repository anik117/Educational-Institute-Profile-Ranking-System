<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SchoolRankingCriterium;
use Illuminate\Http\Request;

class SchoolRankingCriteriaController extends Controller
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

        $results = SchoolRankingCriterium::all();
        $total_students = $results->sum('students');
        $total_fees = $results->sum('fee');

        if (!empty($keyword)) {
            $schoolrankingcriteria = SchoolRankingCriterium::where('pass', 'LIKE', "%$keyword%")
                ->orWhere('attendance', 'LIKE', "%$keyword%")
                ->orWhere('students', 'LIKE', "%$keyword%")
                ->orWhere('teachers', 'LIKE', "%$keyword%")
                ->orWhere('fee', 'LIKE', "%$keyword%")
                ->orWhere('class', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $schoolrankingcriteria = SchoolRankingCriterium::paginate($perPage);
        }

        return view('admin.school-ranking-criteria.index',
               compact('schoolrankingcriteria', 'results', 'total_students', 'total_fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.school-ranking-criteria.create');
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
        
        SchoolRankingCriterium::create($requestData);

        return redirect('admin/school-ranking-criteria')->with('flash_message', 'SchoolRankingCriterium added!');
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
        $schoolrankingcriterium = SchoolRankingCriterium::findOrFail($id);

        return view('admin.school-ranking-criteria.show', compact('schoolrankingcriterium'));
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
        $schoolrankingcriterium = SchoolRankingCriterium::findOrFail($id);

        return view('admin.school-ranking-criteria.edit', compact('schoolrankingcriterium'));
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
        
        $schoolrankingcriterium = SchoolRankingCriterium::findOrFail($id);
        $schoolrankingcriterium->update($requestData);

        return redirect('admin/school-ranking-criteria')->with('flash_message', 'SchoolRankingCriterium updated!');
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
        SchoolRankingCriterium::destroy($id);

        return redirect('admin/school-ranking-criteria')->with('flash_message', 'SchoolRankingCriterium deleted!');
    }
}
