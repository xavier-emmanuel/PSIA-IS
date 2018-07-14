<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use PDF;

class ReportsController extends Controller
{
    //
    public function hiredApplicantReport(Request $request) {
    	$hired = Applicant::where('hired', 1)->get();
    	view()->share('data',$hired);

        $pdf = PDF::loadView('hired_applicants_report');
        return $pdf->stream('hired_applicants_report');
        
    }
}
