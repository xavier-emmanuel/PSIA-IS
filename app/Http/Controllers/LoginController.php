<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Controllers\Controller;
use App\Register;

class LoginController extends Controller
{
		public function login(Request $request)
	  {
	    if (Auth::attempt(['username' => $request->login_username, 'password' => $request->login_password])){
	    	if(Auth::user()->role == 'Applicant') {
	    		if(Auth::user()->verified == 0) {
		        return response()->json(['status' => 'success', 'role' => 'Applicant', 'confirmed' => false, 'username' => Auth::user()->username]);
	    		} else{
		        return response()->json(['status' => 'success', 'role' => 'Applicant', 'confirmed' => true]);
		      }
	    	} else if (Auth::user()->role == 'Human Resource') {
	        return response()->json(['status' => 'success', 'role' => 'Human Resource']);
	    	} else if (Auth::user()->role == 'General Manager') {
	        return response()->json(['status' => 'success', 'role' => 'General Manager']);
	    	}
	    } else {
	    	return response()->json(['status' => 'error']);
	    }
	  }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
