<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;

class InterviewController extends Controller
{
    public function setInterview(Request $request) {
    	$input = Input::all();
    	$interview = Applicant::find($input['hdn_id']);

	    $interview->interview_title = $input['interview_title'];
		$interview->interview_message = $input['interview_message'];
		$interview->date_of_interview = $input['interview_date'];
		$interview->date_hired = null;
		$interview->date_approved = null;
		$interview->save();

		return response()->json(['success'=> 'You have successfully set an interview.']);
    }
}
