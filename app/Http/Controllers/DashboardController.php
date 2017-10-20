<?php

namespace App\Http\Controllers;

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
    public function home(Request $request)
    {
        $request->user()->authorizeRoles(['visitor', 'admin']);
        return view('pages.index');
    }


    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('dashboard');
    }
}
