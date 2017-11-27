<?php

namespace App\Http\Controllers;

use App\User;
use App\Area;
use App\School;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $request->user()->authorizeRoles(['visitor', 'admin']);
    //     return view('dashboard');
    // }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard');
    }

    public function adminDashboard()
    {
        $areas = Area::all();
        $schools = School::all();
        return view('admin.dashboard', compact('areas', 'schools'));
    }
}
