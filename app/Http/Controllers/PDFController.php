<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class PDFController extends Controller
{
    public function pdf(){
    	$users = User::all();
    	$pdf = PDF::loadview('report.user', ['users' => $users]);
    	return $pdf->download('user.pdf');
    }
}
