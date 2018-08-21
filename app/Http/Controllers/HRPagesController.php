<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\JobVacancy;

class HRPagesController extends Controller
{
    public function dashboard() {
        $applicant = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
        $approved = Applicant::where('approved', 1)->where('hired', 0)->count();
        $hired = Applicant::where('hired', 1)->count();
        $job = JobVacancy::where('no_of_vacancy', '!=', 0)->count();
    	return view('hr_dashboard')->with(array('page' => 'Dashboard', 'data' => $applicant, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name, 'approved' => $approved, 'hired' => $hired, 'job' => $job));
    }

    public function jobVacancy() {
        $applicant_form = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
    	return view('job_vacancy')->with(array('page' => 'Job Vacancy', 'data' => $applicant_form, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name));
    }

    public function approvedApplicants() {
        $applicant = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $approved_applicant = Applicant::where('approved', 1)->where('hired', 0)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
    	return view('approved_applicants')->with(array('page' => 'Approved Applicants', 'data' => $applicant, 'approved' => $approved_applicant, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name));
    }

    public function hiredApplicants() {
        $applicant = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $hired_applicant = Applicant::where('hired', 1)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
    	return view('hired_applicants')->with(array('page' => 'Hired Applicants', 'data' => $applicant, 'hired' => $hired_applicant, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name));
    }

    public function profile() {
        $applicant = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
        return view('profile')->with(array('page' => 'User Profile', 'data' => $applicant, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name));
    }

    public function applicantForm($id) {
        $applicant = Applicant::find($id);
        $applicant_form = Applicant::where('role', 'Applicant')->where('job_vacancy_id', '!=', 0)->get();
        $applicant_name = Applicant::where('role', 'Applicant')->first();
        $slug_name = str_slug($applicant_name->first_name.' '.$applicant_name->middle_name.' '.$applicant_name->last_name);
        return view('applicant_form')->with(array('page' => 'Applicant Form | HR', 'applicant' => $applicant, 'data' => $applicant_form, 'applicant_name' => $applicant_name, 'slug_name' => $slug_name));
    }
}
