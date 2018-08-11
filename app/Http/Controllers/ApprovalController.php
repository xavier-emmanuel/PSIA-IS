<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Applicant;
use Carbon\Carbon;
use App\Mail\ApprovedApplicant;
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
		$email = $input['hdn_email'];
		$job = $input['hdn_job'];

		Mail::to($email)->send(new ApprovedApplicant($name, $job));

		return response()->json(['success'=> 'You have successfully approved the applicant.']);
    }
}
