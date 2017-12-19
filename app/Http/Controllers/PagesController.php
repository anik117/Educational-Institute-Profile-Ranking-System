<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$schools=School::all();
    	// $schools = School::paginate(2);
    	return view('index', ['schools' => $schools]);
    }
    public function about(){
    	return view('pages.about');
    }
}
