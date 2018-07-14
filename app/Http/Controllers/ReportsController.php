<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use PDF;

class ReportsController extends Controller
{
    public function hiredApplicantReport(Request $request) {
    	$hired = Applicant::where('hired', 1)->get();
        $view = \View::make('hired_applicants_report')->with(array('data' => $hired));
        $html = $view->render();
     
        PDF::SetTitle('Hired Applicants');
        PDF::AddPage();
        PDF::writeHTML($html);
        PDF::Output('hired_applicants_report.pdf', 'I');
    }
}
