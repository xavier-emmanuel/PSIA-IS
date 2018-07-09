<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
		public function index() {
			return view('index')->with(array('page' => 'Home'));
		}

		public function about() {
			return view('about')->with(array('page' => 'About'));
		}

		public function contact() {
			return view('contact')->with(array('page' => 'Contact'));
		}

		public function register() {
			return view('register')->with(array('page' => 'Register'));
		}
}
