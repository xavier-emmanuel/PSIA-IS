<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use PDF;

class ReportsController extends Controller
{
    public function hiredApplicantReport(Request $request) {
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::Write(0, 'Hello World');
        PDF::Output();
    }
}
