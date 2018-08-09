<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;
use Carbon\Carbon;
use Mail;

class ApprovalController extends Controller
{
    public function approveApplicant(Request $request) {
    	$input = Input::all();
    	$approve = Applicant::find($input['hdn_id']);

    	$approve->date_approved = Carbon::now();
    	$approve->approved = 1;
		$approve->date_hired = null;
	    
		$approve->save();

		$name = $input['hdn_name'];
		$first_name = explode(' ',trim($name));

		$data = array(
	                'name' => $input['hdn_name'],
	                'email' => $input['hdn_email'],
	                'subject' => 'Approval',
	                'page' => 'Dashboard',
	                'msg' => 'Hi '. $first_name[0] .','.
	                		 '<br><br>'.'Your application has been approved. Thank you!'
	            );
	   
	    Mail::send('approval_message',
	       $data, function($message) use ($input)
	    {	
	       $message->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency');
	       $message->to($input['hdn_email'], $input['hdn_name'])->subject('Approval');
	    });

		return response()->json(['success'=> 'You have successfully approved the applicant.']);
    }
}
