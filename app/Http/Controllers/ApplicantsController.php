<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class ApplicantsController extends Controller
{
    //
	public function ajaxShowApplicants(Request $request) {
		$applicant = Applicant::where('job_vacancy_id', '!=', 0)->get();

		$data = array();

    	foreach($applicant as $row) {
            if ($row->hired == 1 && $row->approved == 0) {
              $result = 'Hired';
            } else if ($row->hired == 1 && $row->approved == 1) {
              $result = 'Hired';
            } else if ($row->hired == 0 && $row->approved == 1) {
              $result = 'Approved';
            } else {
              $result = '';
            }

            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
			      $job = '<td>'.$row->jobVacancies->name.'</td>';
            $mobile = '<td>'.$row->mobile.'</td>';
            $age = '<td>'.$row->age.'</td>';
            $gender = '<td>'.$row->gender.'</td>';
            $button = '<td>
                        <button class="btn btn-info" id="btn-view-profile-'.$row->id.'" title="View Profile" data-toggle="modal" data-target="#applicant-profile" data-id="'.$row->id.'" data-email="'.$row->email.'" data-image="/uploads/accounts/'.$row->image.'" data-name="'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'" data-job="'.$row->jobVacancies->name.'" data-age="'.$row->age.'" data-gender="'.$row->gender.'" data-address="'.$row->address.'" data-mobile="'.$row->mobile.'" data-interview-title="'.$row->interview_title.'" data-interview-message="'.$row->interview_message.'" data-interview-date="'.$row->date_of_interview.'" data-interview-time="'.$row->date_of_interview.'" data-result="'.$result.'" data-training-date="" data-date-hired="'.$row->date_hired.'" data-interviewed="'.$row->interviewed.'" data-score="'.$row->score.'">
                          <i class="fas fa-eye "></i>
                        </button>
                      </td>';

    	     	$data[] = array(
 								$id,
 								$name,
 								$job,
								$mobile,
								$age,
								$gender,
 								$button
	     					);
  	    }

	  	$output = array(
	      "data" => $data
	    );

		return response()->json($output);
	}

	public function ajaxShowHiredApplicants(Request $request) {
		$applicant = Applicant::where('hired', 1)->get();

		$data = array();

    	foreach($applicant as $row) {
            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
			      $job = '<td>'.$row->jobVacancies->name.'</td>';
            $mobile = '<td>'.$row->mobile.'</td>';
            $age = '<td>'.$row->age.'</td>';
            $gender = '<td>'.$row->gender.'</td>';
            $button = '<td>
                        <button class="btn btn-info " title="View Profile ">
                          <i class="fas fa-eye "></i>
                        </button>
                      </td>';

    	     	$data[] = array(
 								$id,
 								$name,
 								$job,
								$mobile,
								$age,
								$gender,
 								$button
	     					);
  	    }

	  	$output = array(
	      "data" => $data
	    );

		return response()->json($output);
	}

	public function ajaxShowApprovedApplicants(Request $request) {
		$applicant = Applicant::where('approved', 1)->get();

		$data = array();

    	foreach($applicant as $row) {
            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
			      $job = '<td>'.$row->jobVacancies->name.'</td>';
            $mobile = '<td>'.$row->mobile.'</td>';
            $age = '<td>'.$row->age.'</td>';
            $gender = '<td>'.$row->gender.'</td>';
            $button = '<td>
                        <button class="btn btn-info " title="View Profile ">
                          <i class="fas fa-eye "></i>
                        </button>
                      </td>';

    	     	$data[] = array(
 								$id,
 								$name,
 								$job,
								$mobile,
								$age,
								$gender,
 								$button
	     					);
  	    }

	  	$output = array(
	      "data" => $data
	    );

		return response()->json($output);
	}

  public function ajaxShowEvaluatedApplicants(Request $request) {
    $applicant = Applicant::where('interviewed', 1)->where('score', '!=', null)->get();

    $data = array();

      foreach($applicant as $row) {
            if ($row->hired == 1 && $row->approved == 0) {
              $result = 'Hired';
            } else if ($row->hired == 1 && $row->approved == 1) {
              $result = 'Hired';
            } else if ($row->hired == 0 && $row->approved == 1) {
              $result = 'Approved';
            } else {
              $result = '';
            }

            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
            $job = '<td>'.$row->jobVacancies->name.'</td>';
            $mobile = '<td>'.$row->mobile.'</td>';
            $age = '<td>'.$row->age.'</td>';
            $gender = '<td>'.$row->gender.'</td>';
            $button = '<td>
                        <button class="btn btn-info" id="btn-view-profile-'.$row->id.'" title="View Profile" data-toggle="modal" data-target="#applicant-profile" data-id="'.$row->id.'" data-email="'.$row->email.'" data-image="/uploads/accounts/'.$row->image.'" data-name="'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'" data-job="'.$row->jobVacancies->name.'" data-age="'.$row->age.'" data-gender="'.$row->gender.'" data-address="'.$row->address.'" data-mobile="'.$row->mobile.'" data-interview-title="'.$row->interview_title.'" data-interview-message="'.$row->interview_message.'" data-interview-date="'.$row->date_of_interview.'" data-interview-time="'.$row->date_of_interview.'" data-result="'.$result.'" data-training-date="" data-date-hired="'.$row->date_hired.'" data-interviewed="'.$row->interviewed.'" data-score="'.$row->score.'">
                          <i class="fas fa-eye "></i>
                        </button>
                      </td>';

            $data[] = array(
                $id,
                $name,
                $job,
                $mobile,
                $age,
                $gender,
                $button
                );
        }

      $output = array(
        "data" => $data
      );

    return response()->json($output);
  }
}
