<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Register;
use App\PersonalInfo;
use App\EducationalBackground;
use App\GovernmentExams;
use App\Organizations;
use App\EmploymentRecord;
use App\Questions;
use App\PersonalPreference;

class JobApplicationController extends Controller
{
    public function ajaxStore(Request $request) {
    	$applicant = Register::find(Auth::id());
    	$applicant->job_vacancy_id = $request->job_id;
    	$applicant->save();

    	$personal_info = new PersonalInfo;
    	$personal_info->account_id = Auth::id();
    	$personal_info->provincial_address = $request->application_provincial_address;
    	$personal_info->phone_number = $request->application_phone_number;
    	$personal_info->place_of_birth = $request->application_place_of_birth;
    	$personal_info->religion = $request->application_religion;
    	$personal_info->height = $request->application_height;
    	$personal_info->weight = $request->application_weight;
    	$personal_info->sss_number = $request->application_sss_number;
    	$personal_info->tin_number = $request->application_tin_number;
    	$personal_info->philhealth_number = $request->application_philhealth;
    	$personal_info->license_number = $request->application_license_number;
    	$personal_info->date_issued = $request->application_date_issued;
    	$personal_info->expiration_date = $request->application_date_of_expiration;
    	$personal_info->father_name = $request->application_name_of_father;
    	$personal_info->father_birth_date = $request->application_father_date_of_birth;
    	$personal_info->father_occupation = $request->application_father_occupation;
    	$personal_info->mother_name = $request->application_name_of_mother;
    	$personal_info->mother_birth_date = $request->application_mother_date_of_birth;
    	$personal_info->mother_occupation = $request->application_mother_occupation;
    	$personal_info->siblings_name_1 = $request->application_sibling_1_name;
    	$personal_info->siblings_birth_date_1 = $request->application_sibling_1_date_of_birth;
    	$personal_info->siblings_occupation_1 = $request->application_sibling_1_occupation;
    	$personal_info->siblings_name_2 = $request->application_sibling_2_name;
    	$personal_info->siblings_birth_date_2 = $request->application_sibling_2_date_of_birth;
    	$personal_info->siblings_occupation_2 = $request->application_sibling_2_occupation;
    	$personal_info->siblings_name_3 = $request->application_sibling_3_name;
    	$personal_info->siblings_birth_date_3 = $request->application_sibling_3_date_of_birth;
    	$personal_info->siblings_occupation_3 = $request->application_sibling_3_occupation;
    	$personal_info->spouse_name = $request->application_name_of_spouse;
    	$personal_info->spouse_birth_date = $request->application_spouse_date_of_birth;
    	$personal_info->spouse_occupation = $request->application_spouse_occupation;
    	$personal_info->spouse_dependent = $request->application_dependent;
    	$personal_info->child_name_1 = $request->application_child_1_name;
    	$personal_info->child_birth_date_1 = $request->application_child_1_date_of_birth;
    	$personal_info->child_occupation_1 = $request->application_child_1_occupation;
    	$personal_info->child_name_2 = $request->application_child_2_name;
    	$personal_info->child_birth_date_2 = $request->application_child_2_date_of_birth;
    	$personal_info->child_occupation_2 = $request->application_child_2_occupation;
    	$personal_info->child_name_3 = $request->application_child_3_name;
    	$personal_info->child_birth_date_3 = $request->application_child_3_date_of_birth;
    	$personal_info->child_occupation_3 = $request->application_child_3_occupation;
    	$personal_info->contact_name = $request->application_contact_name;
    	$personal_info->contact_relation = $request->application_contact_relation;
    	$personal_info->contact_number = $request->application_contact_number;
    	$personal_info->contact_address = $request->application_contact_address;
    	$personal_info->updated_at = null;
    	$personal_info->save();

    	$education = new EducationalBackground;
    	$education->account_id = Auth::id();
    	$education->elementary_school = $request->application_elementary;
    	$education->elementary_award = $request->application_elementary_honor;
    	$education->elementary_year = $request->application_elementary_year_graduated;
    	$education->elementary_address = $request->application_elementary_school_address;
    	$education->highschool_school = $request->application_high_school;
    	$education->highschool_award = $request->application_high_school_honor;
    	$education->highschool_year = $request->application_high_school_year_graduated;
    	$education->highschool_address = $request->application_high_school_school_address;
    	$education->college_school = $request->application_college;
    	$education->college_award = $request->application_college_honor;
    	$education->college_year = $request->application_college_year_graduated;
    	$education->college_address = $request->application_college_school_address;
    	$education->updated_at = null;
    	$education->save();

    	$government = new GovernmentExams;
    	$government->account_id = Auth::id();
    	$government->examination_1 = $request->application_type_1;
      $government->examination_date_taken_1 = $request->application_date_taken_1;
      $government->examination_result_1 = $request->application_result_1;
      $government->examination_place_taken_1 = $request->application_exam_address_1;
      $government->examination_2 = $request->application_type_2;
      $government->examination_date_taken_2 = $request->application_date_taken_2;
      $government->examination_result_2 = $request->application_result_2;
      $government->examination_place_taken_2 = $request->application_exam_address_2;
      $government->examination_3 = $request->application_type_3;
      $government->examination_date_taken_3 = $request->application_date_taken_3;
      $government->examination_result_3 = $request->application_result_3;
      $government->examination_place_taken_3 = $request->application_exam_address_3;
      $government->updated_at = null;
      $government->save();

	  	$organization = new Organizations;
	  	$organization->account_id = Auth::id();
	  	$organization->organization_name_1 = $request->application_organization_name_1;
	    $organization->organization_date_from_1 = $request->application_membership_year_from_1;
	    $organization->organization_date_to_1 = $request->application_membership_year_to_1;
	    $organization->organization_position_1 = $request->application_organization_position_1;
	    $organization->organization_name_2 = $request->application_organization_name_2;
	    $organization->organization_date_from_2 = $request->application_membership_year_from_2;
	    $organization->organization_date_to_2 = $request->application_membership_year_to_2;
	    $organization->organization_position_2 = $request->application_organization_position_2;
	    $organization->organization_name_3 = $request->application_organization_name_3;
	    $organization->organization_date_from_3 = $request->application_membership_year_from_3;
	    $organization->organization_date_to_3 = $request->application_membership_year_to_3;
	    $organization->organization_position_3 = $request->application_organization_position_3;
	    $organization->updated_at = null;
	    $organization->save();
   
	    $employment = new EmploymentRecord;
	    $employment->account_id = Auth::id();
	    $employment->company_name_1 = $request->application_company_name_1;
	    $employment->period_of_emlployment_from_1 = $request->application_employment_period_from_1;
	    $employment->period_of_emlployment_to_1 = $request->application_employment_period_to_1;
	    $employment->company_address_1 = $request->application_employment_address_1;
	    $employment->work_position_1 = $request->application_employment_position_1;
	    $employment->superior_name_1 = $request->application_name_of_superior_1;
	    $employment->nature_of_job_1 = $request->application_nature_of_job_1;
	    $employment->starting_salary_1 = $request->application_starting_salary_1;
	    $employment->salary_upon_leaving_1 = $request->application_leaving_salary_1;
	    $employment->reason_of_leaving_1 = $request->application_leaving_reason_1;
	    $employment->company_name_2 = $request->application_company_name_2;
	    $employment->period_of_emlployment_from_2 = $request->application_employment_period_from_2;
	    $employment->period_of_emlployment_to_2 = $request->application_employment_period_to_2;
	    $employment->company_address_2 = $request->application_employment_address_2;
	    $employment->work_position_2 = $request->application_employment_position_2;
	    $employment->superior_name_2 = $request->application_name_of_superior_2;
	    $employment->nature_of_job_2 = $request->application_nature_of_job_2;
	    $employment->starting_salary_2 = $request->application_starting_salary_2;
	    $employment->salary_upon_leaving_2 = $request->application_leaving_salary_2;
	    $employment->reason_of_leaving_2 = $request->application_leaving_reason_2;
	    $employment->company_name_3 = $request->application_company_name_3;
	    $employment->period_of_emlployment_from_3 = $request->application_employment_period_from_3;
	    $employment->period_of_emlployment_to_3 = $request->application_employment_period_to_3;
	    $employment->company_address_3 = $request->application_employment_address_3;
	    $employment->work_position_3 = $request->application_employment_position_3;
	    $employment->superior_name_3 = $request->application_name_of_superior_3;
	    $employment->nature_of_job_3 = $request->application_nature_of_job_3;
	    $employment->starting_salary_3 = $request->application_starting_salary_3;
	    $employment->salary_upon_leaving_3 = $request->application_leaving_salary_3;
	    $employment->reason_of_leaving_3 = $request->application_leaving_reason_3;
	    $employment->updated_at = null;
	    $employment->save();

	    $question = new Questions;
	    $question->account_id = Auth::id();
	    $question->dialect = $request->application_dialects;
	    if(Input::get('convictionOptions') == 'Yes') {
    		$question->convicted = 1;
    	} elseif (Input::get('convictionOptions') == 'No') {
    		$question->convicted = 0;
    	}
      $question->convicted_details = $request->application_conviction_reason;
      if(Input::get('healthProblemOptions') == 'Yes') {
    		$question->health_problems = 1;
    	} elseif (Input::get('healthProblemOptions') == 'No') {
    		$question->health_problems = 0;
    	}
      $question->health_problems_details = $request->application_health_problem;
      if(Input::get('operationOptions') == 'Yes') {
    		$question->accident = 1;
    	} elseif (Input::get('operationOptions') == 'No') {
    		$question->accident = 0;
    	}
      $question->accident_details = $request->application_operation;
      $question->recommend_name = $request->application_recommended_by;
      if(Input::get('companyRelativeOptions') == 'Yes') {
    		$question->relative = 1;
    	} elseif (Input::get('companyRelativeOptions') == 'No') {
    		$question->relative = 0;
    	}
      $question->relative_name = $request->application_relative;
      if(Input::get('subsidiaryOptions') == 'Yes') {
    		$question->subsidiary_office = 1;
    	} elseif (Input::get('subsidiaryOptions') == 'No') {
    		$question->subsidiary_office = 0;
    	}
      $question->subsidiary_office_reason = $request->application_subsidary;
      if(Input::get('provicialAssignmentOptions') == 'Yes') {
    		$question->provincial_assignments = 1;
    	} elseif (Input::get('provicialAssignmentOptions') == 'No') {
    		$question->provincial_assignments = 0;
    	}
      $question->preffered_office = $request->application_assignment;
      $question->skills = $request->application_skills;
      $selected_skills = implode(", ", $request->get('selected_skill'));
      $question->skills_select = $selected_skills;
      $question->self_description = $request->personal_description;
      $question->reason_of_applying = $request->reasons_of_appying;
      $question->career_goals = $request->carreer_goals;
      $question->accomplishments = $request->personal_accomplishments;
	    $question->updated_at = null;
	    $question->save();

	    $preference = new PersonalPreference;
	    $preference->account_id = Auth::id();
	    $preference->preference_name_1 = $request->preference_name_1;
      $preference->preference_occupation_1 = $request->preference_occupation_1;
      $preference->preference_contact_1 = $request->preference_contact_1;
      $preference->preference_name_2 = $request->preference_name_2;
      $preference->preference_occupation_2 = $request->preference_occupation_2;
      $preference->preference_contact_2 = $request->preference_contact_2;
      $preference->preference_name_3 = $request->preference_name_3;
      $preference->preference_occupation_3 = $request->preference_occupation_3;
      $preference->preference_contact_3 = $request->preference_contact_3;
      $preference->updated_at = null;
      $preference->save();

    	return response()->json(['success'=>true, 'message'=>'Your application has been successfully sent.']);
    }
}
