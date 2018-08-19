<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\PersonalInfo;

class GMPagesController extends Controller
{
    public function dashboard() {
    	$applicant = Applicant::where('interviewed', 1)->where('score', '!=', null)->where('hired', 0)->where('approved', 0)->get();
    	return view('gm_dashboard')->with(array('page' => 'Dashboard' , 'data' => $applicant));
    }

    public function applicantForm($id) {
    	$applicant = Applicant::find($id);
    	return view('applicant_form')->with(array('page' => 'Applicant Form | GM', 'applicant' => $applicant));
    }
}
