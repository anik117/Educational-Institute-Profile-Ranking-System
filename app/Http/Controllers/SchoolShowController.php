<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolShowController extends Controller
{
    public function index(){
    	$schools=School::all();
    	return view('school.index',compact('schools'));
    }

    public function show($id){
    	$school = School::find($id);
    	return view('school.show',compact('school'));
    }
}
