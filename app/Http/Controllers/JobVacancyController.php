<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\JobVacancy;

class JobVacancyController extends Controller
{
	public function ajaxShow(Request $request) {
		$job_vacancy = JobVacancy::all();

		$data = array();
	
    	foreach($job_vacancy as $row) {
            $id = '<td>'.$row->id.'</td>';
            $name = '<td>'.$row->name.'</td>';
            $vacancy = '<td>'.$row->no_of_vacancy.'</td>';
            $description = '<td>'.$row->description.'</td>';
            $button = '<td>
                        <button class="btn btn-info btn-edit-job-vacancy" title="Edit Job Vacancy" data-toggle="modal" data-target="#edit-job-vacancy" data-backdrop="static" data-id="'.$row->id.'" data-image="'.$row->image.'">
                          <i class="fas fa-edit "></i>
                        </button>
                        <button class="btn btn-info btn-delete-job-vacancy" title="Delete Job Vacancy" data-toggle="modal" data-target="#delete-job-vacancy" data-id="'.$row->id.'" data-name="'.$row->name.'">
                          <i class="fas fa-trash "></i>
                        </button>
                      </td>';

    	     	$data[] = array(
 								$id,
 								$name,
 								$vacancy,
 								$description,
 								$button
	     					);
  	    }

	  	$output = array(
	      "data" => $data
	    );

		return response()->json($output);
	}

    public function ajaxStore(Request $request) {
    	$job_vacancy = new JobVacancy;

    	$file = $request->job_image;
    	$image_name = time().$file->getClientOriginalName();
			$file->move(public_path().'/uploads/job_vacancy/', $image_name);

    	$job_vacancy->name = $request->job_name;
    	$job_vacancy->no_of_vacancy = $request->no_of_vacancy;
    	$job_vacancy->image = $image_name;
    	$job_vacancy->description = $request->job_description;

    	if(Input::get('hiring_status') == 'Yes') {
    		$job_vacancy->hiring_status = 1;
    	} elseif (Input::get('hiring_status') == 'No') {
    		$job_vacancy->hiring_status = 0;
    	}

    	$job_vacancy->updated_at = null;
    	$job_vacancy->save();

    	return response()->json(['success' => 'Job vacancy has been successfully added.']);
    }

    public function ajaxUpdate(Request $request) {
    	$job_vacancy = JobVacancy::find($request->hdn_edit_job_id);
	  	
	  	if($request->hasfile('edit_job_image')) {
	  		$file = $request->edit_job_image;
	      $image_name = time().$file->getClientOriginalName();
				$file->move(public_path().'/uploads/job_vacancy/', $image_name);

	  		$job_vacancy->image = $image_name;
	  	}

	  	$job_vacancy->name = $request->edit_job_name;
    	$job_vacancy->no_of_vacancy = $request->edit_no_of_vacancy;
    	$job_vacancy->description = $request->edit_job_description;

    	if(Input::get('edit_hiring_status') == 'Yes') {
    		$job_vacancy->hiring_status = 1;
    	} elseif (Input::get('edit_hiring_status') == 'No') {
    		$job_vacancy->hiring_status = 0;
    	}

			$job_vacancy->save();

			return response()->json(['success'=>'Job vacancy has been successfully updated.']);
    }

    public function ajaxDelete(Request $request) {
    	$job_vacancy = JobVacancy::find($request->hdn_delete_job_id);

		$job_vacancy->delete();
		return response()->json(['success'=>'Job vacancy has been successfully deleted.']);
    }

    public function ajaxUpdateShow(Request $request) {
        $job_vacancy = JobVacancy::where('id', $request->job_id)->first();

        return response()->json($job_vacancy);
    }
}
