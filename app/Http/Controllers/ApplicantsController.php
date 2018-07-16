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
}