<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;
use Carbon\Carbon;
use App\Mail\HiredApplicant;
use Mail;

class HireController extends Controller
{
	public function hireApplicant(Request $request) {
	    $input = Input::all();
	    $hired = Applicant::find($input['hdn_id']);

	    $hired->date_hired = Carbon::now();
	    $hired->hired = 1;

		$hired->save();

		$name = $input['hdn_name'];
		$email = $input['hdn_email'];
		$job = $input['hdn_job'];

		Mail::to($email)->send(new HiredApplicant($name, $job));

		return response()->json(['success'=> 'You have successfully hired the applicant.']);
	}
}
