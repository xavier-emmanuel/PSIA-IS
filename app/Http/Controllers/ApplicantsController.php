<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class ApplicantsController extends Controller
{
    //
	public function ajaxShow(Request $request) {
		$applicant = Applicant::all();

		$data = array();

    	foreach($applicant as $row) {
            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
            			if($row->job_vacancy_id == 0 ) {
							$job = '';
						} else {
							$job = '<td>'.$row->job_vacancy_id.'</td>';
						}
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
