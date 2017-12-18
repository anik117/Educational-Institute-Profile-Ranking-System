<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Headmaster;
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

        $total_students = 0;
        $total_fees = 0;
        $total_pass = 0;
        $total_attendance = 0;

        $school_id = Headmaster::where('user_id',auth()->user()->id)->first()->school->id;
        $schoolrankingcriteria = SchoolRankingCriterium::where('school_id', $school_id)->get();
        if(count($schoolrankingcriteria)>0){
            $total_students = $schoolrankingcriteria->sum('students');
            $total_fees = $schoolrankingcriteria->sum('fee')/count($schoolrankingcriteria);
            $total_pass = $schoolrankingcriteria->sum('pass')/count($schoolrankingcriteria);
            $total_attendance = $schoolrankingcriteria->sum('attendance')/count($schoolrankingcriteria);
        }

        return view('admin.school-ranking-criteria.index',
               compact('schoolrankingcriteria', 'total_students', 'total_fees', 'total_pass', 'total_attendance'));
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
        $schoolrankingcriterium = $request->validate([
          'school_id' => 'required',
          'class'=> 'required',
          'pass'=> 'required|numeric|between:0,100',
          'attendance'=> 'required|numeric|between:0,100',
          'students'=> 'required|numeric|min:10',
          'fee'=> 'required|numeric|min:20'
        ]);
        $schoolrankingcriterium = new SchoolRankingCriterium;
        $schoolrankingcriterium->school_id = Headmaster::where('user_id',auth()->user()->id)->first()->school->id;
        $schoolrankingcriterium->class = $request->class;
        $schoolrankingcriterium->pass = $request->pass;
        $schoolrankingcriterium->attendance = $request->attendance;
        $schoolrankingcriterium->students = $request->students;
        $schoolrankingcriterium->fee = $request->fee;
        $schoolrankingcriterium->save();

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
