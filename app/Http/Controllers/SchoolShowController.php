<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\SchoolRankingCriterium;

class SchoolShowController extends Controller
{
    public function index(){
    	$schools=School::all();
    	return view('school.index',compact('schools'));
    }

    public function show($id){
    	$school = School::find($id);

    	$classes = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
    	$classData = []; $attendences = [];
    	foreach ($classes as $class) {
    		$data = SchoolRankingCriterium::where('school_id', $id)->where('class', $class)->first();
    		array_push($classData, isset($data['students']) ? $data->students : 0);
    		array_push($attendences, isset($data['attendance']) ? $data->attendance : 0);
    	}
    	$classData = json_encode($classData, JSON_UNESCAPED_SLASHES);
    	$classes = json_encode($classes, JSON_UNESCAPED_SLASHES);
    	$attendences = json_encode($attendences, JSON_UNESCAPED_SLASHES);
    	return view('school.show',['school' => $school, 'classData' => $classData, 'classes' => $classes,
    				'attendences' => $attendences]);
    }
}
