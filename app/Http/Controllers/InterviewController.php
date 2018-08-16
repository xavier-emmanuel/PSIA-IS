<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;
use App\Mail\Interview;
use Carbon\Carbon;
use Mail;

class InterviewController extends Controller
{
    public function setInterview(Request $request) {
    	$input = Input::all();
    	$interview = Applicant::find($input['hdn_id']);

    	if ($input['frm_status'] == 'Save') {
    		$interview->interview_title = $input['interview_title'];
			$interview->interview_message = $input['interview_message'];
			$interview->date_of_interview = $input['interview_date'];
			$interview->date_hired = null;
			$interview->date_approved = null;
			$interview->score = null;
			$interview->save();

			$frm_status = 'Save';
			$interviewDate = Carbon::parse($input['interview_date'])->format('F d, Y');
			$interviewTime = Carbon::parse($input['interview_date'])->format('h:i A');
			$title = $input['interview_title'];
			$message = $input['interview_message'];

			Mail::to($input['hdn_email'])->send(new Interview($interviewDate, $interviewTime, $title, $message, $frm_status));
    	} else if ($input['frm_status'] == 'Update') {

    		if (isset($input['exam_score'])) {
    			$score = $input['exam_score'];
    		} else {
    			$score = null;
    		}

    		$interview->interview_title = $input['interview_title'];
			$interview->interview_message = $input['interview_message'];
			$interview->date_of_interview = $input['interview_date'];
			$interview->date_hired = null;
			$interview->date_approved = null;
			$interview->interviewed = $input['interviewed'];
			$interview->score = $score;
			$interview->save();
    	} else if ($input['frm_status'] == 'Resched') {

    		if (isset($input['exam_score'])) {
    			$score = $input['exam_score'];
    		} else {
    			$score = null;
    		}

    		$interview->interview_title = $input['interview_title'];
			$interview->interview_message = $input['interview_message'];
			$interview->date_of_interview = $input['interview_date'];
			$interview->date_hired = null;
			$interview->date_approved = null;
			$interview->interviewed = $input['interviewed'];
			$interview->score = $score;
			$interview->save();

			$frm_status = 'Resched';
			$interviewDate = Carbon::parse($input['interview_date'])->format('F d, Y');
			$interviewTime = Carbon::parse($input['interview_date'])->format('h:i A');
			$title = $input['interview_title'];
			$message = $input['interview_message'];

			Mail::to($input['hdn_email'])->send(new Interview($interviewDate, $interviewTime, $title, $message, $frm_status));
    	}


			return response()->json(['success'=> 'You have successfully set an interview.']);
    }
}
