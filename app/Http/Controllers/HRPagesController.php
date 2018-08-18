<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\JobVacancy;

class HRPagesController extends Controller
{
    public function dashboard() {
        $approved = Applicant::where('approved', 1)->count();
        $hired = Applicant::where('hired', 1)->count();
        $job = JobVacancy::where('no_of_vacancy', '!=', 0)->count();
    	return view('hr_dashboard')->with(array('page' => 'Dashboard', 'approved' => $approved, 'hired' => $hired, 'job' => $job));
    }

    public function jobVacancy() {
    	return view('job_vacancy')->with(array('page' => 'Job Vacancy'));
    }

    public function approvedApplicants() {
    	return view('approved_applicants')->with(array('page' => 'Approved Applicants'));
    }

    public function hiredApplicants() {
    	return view('hired_applicants')->with(array('page' => 'Hired Applicants'));
    }

    public function profile() {
        return view('profile')->with(array('page' => 'User Profile'));
    }

    public function applicantForm($id) {
        $applicant = Applicant::find($id);
        return view('applicant_form')->with(array('page' => 'Applicant Form | HR', 'applicant' => $applicant));
    }
}
