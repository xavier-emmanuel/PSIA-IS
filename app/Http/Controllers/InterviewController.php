<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;
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

			$data = array(
		                'name' => $input['hdn_name'],
		                'email' => $input['hdn_email'],
		                'subject' => $input['interview_title'],
		                'page' => 'Dashboard',
		                'msg' => $input['interview_message'] .'
		                		<br><br>'.'Interview Date: '. 
		                		Carbon::parse($input['interview_date'])->format('F d, Y h:i A')
		            );
		   
		    Mail::send('set_interview_message',
		       $data, function($message) use ($input)
		    {	
		       $message->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency');
		       $message->to($input['hdn_email'], $input['hdn_name'])->subject($input['interview_title']);
		    });
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
    	}
    	

		return response()->json(['success'=> 'You have successfully set an interview.']);
    }
}
