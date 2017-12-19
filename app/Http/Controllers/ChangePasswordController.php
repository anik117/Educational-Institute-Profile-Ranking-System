<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
	public function viewChangePassword(){
		return view('admin.changePassword');
	}
    public function changePassword(Request $request){
    	$user = $request->validate([
          'password'=> 'required|min:6',
          'password_confirmation'=> 'required|min:6'
        ]);

    	$user = User::where('email', auth()->user()->email)->first();
     	if(Hash::check($request->current_password, $user->password)){
			if($request->password == $request->password_confirmation){
				$user->password = bcrypt($request->password);
				$user->save();
			}
			else{
				return redirect('/change/password');
			}
    	}
    	else{
			return redirect('/change/password');
    	}
    	return redirect('/admin');
    }
}
