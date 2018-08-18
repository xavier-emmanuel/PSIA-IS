<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\JobVacancy;

class PagesController extends Controller
{
		public function index() {
			$featured_jobs = JobVacancy::where([['featured', '=', 1], ['no_of_vacancy', '!=', 0]])->get();
			$urgent_jobs = JobVacancy::where([['featured', '=', 0], ['hiring_status', '=', 1], ['no_of_vacancy', '!=', 0]])->get();
			$jobs = JobVacancy::where([['no_of_vacancy', '!=', 0], ['featured', '=', 0], ['hiring_status', '=', 0]])->get();

			return view('index')->with(array('page' => 'Home', 'featured_jobs' => $featured_jobs, 'urgent_jobs' => $urgent_jobs, 'jobs' => $jobs));
		}

		public function about() {
			return view('about')->with(array('page' => 'About'));
		}

		public function contact() {
			return view('contact')->with(array('page' => 'Contact Us'));
		}

		public function register() {
			return view('register')->with(array('page' => 'Register'));
		}

		public function verifyAccount($username) {
			$account = Register::where('username', $username)->first();
			return view('verify')->with(array('page' => 'Verify Account', 'data' => $account));
		}

		public function jobApplication($job_id) {
			$job = JobVacancy::where('id', $job_id)->first();
			return view('job_application')->with(array('page' => 'Job Application', 'job' => $job));
		}
}
