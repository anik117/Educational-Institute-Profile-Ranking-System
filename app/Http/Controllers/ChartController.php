<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use App\Area;
use App\School;
use DB;

class ChartController extends Controller
{
    public function chart()

      {

        $chart = Charts::multiDatabase('bar', 'highcharts')
            ->title("User, Area and Schools")
            ->dataset('User', User::all())
            ->dataset('Area', Area::all())
            ->dataset('School', School::all())
            ->responsive(true)
            ->lastByMonth(3, true);

          return view('admin.chart', compact('chart'));

      }
}
