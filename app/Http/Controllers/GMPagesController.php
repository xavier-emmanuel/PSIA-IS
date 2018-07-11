<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GMPagesController extends Controller
{
    public function dashboard() {
    	return view('gm_dashboard')->with(array('page' => 'Dashboard'));
    }
}
