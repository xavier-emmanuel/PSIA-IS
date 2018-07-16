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
		        return redirect()->intended('/verify-account/'.Auth::user()->first_name);
	    		} else{
		        return redirect()->intended('/');
		      }
	    	} else if (Auth::user()->role == 'Human Resource') {
	        return redirect()->intended('/HR-dashboard');
	    	} else if (Auth::user()->role == 'General Manager') {
	        return redirect()->intended('/GM-dashboard');
	    	}
	    } else {
	    	return back()->withErrors(['Invalid login credentials!']);
	    }
	  }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
