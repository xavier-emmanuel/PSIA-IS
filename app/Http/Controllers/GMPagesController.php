<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\PersonalInfo;

class GMPagesController extends Controller
{
    public function dashboard() {
    	return view('gm_dashboard')->with(array('page' => 'Dashboard'));
    }

    public function applicantForm($id) {
    	$applicant = Applicant::find($id);
    	return view('applicant_form')->with(array('page' => 'Applicant Form | GM', 'applicant' => $applicant));
    }
}
