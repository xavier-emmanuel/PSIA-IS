<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRPagesController extends Controller
{
    public function dashboard() {
    	return view('hr_dashboard')->with(array('page' => 'Dashboard'));
    }

    public function jobVacancy() {
    	return view('job_vacancy')->with(array('page' => 'Job Vacancy'));
    }

    public function applicants() {
    	return view('applicants')->with(array('page' => 'Applicant List'));
    }

    public function approvedApplicants() {
    	return view('approved_applicants')->with(array('page' => 'Approved Applicants'));
    }

    public function hiredApplicants() {
    	return view('hired_applicants')->with(array('page' => 'Hired Applicants'));
    }
}
