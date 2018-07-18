<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Register;

class RegisterController extends Controller
{
    //
    public function ajaxStore(Request $request) {
    	$input = Input::all();

    	if($input['image']) {
				$file = $input['image'];
				$name=time().$file->getClientOriginalName();
				$file->move(public_path().'/uploads/accounts/', $name);
			}

			$code = intval(rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
			
			// $username = "imjordanlopez@gmail.com";
			// $hash = "5c768719065ead607b69e04c08ce2fc4e8265884f91fec5bdaed27ecfd1e9f9a";

			// // Config variables. Consult http://api.txtlocal.com/docs for more info.
			// $test = "0";

			// // Data for text message. This is the text message data.
			// $sender = "PSIA"; // This is who the message appears to be from.
			// $numbers = "63".$input['mobile']; // A single number or a comma-seperated list of numbers
			// $message = 'This is Patton Security & Investigation Agency. 
			
			// Your verification code is '.$code.'.';
			// // 612 chars or less
			// // A single number or a comma-seperated list of numbers
			// $message = urlencode($message);
			// $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			// $ch = curl_init('http://api.txtlocal.com/send/?');
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// $result = curl_exec($ch); // This is the result from the API
			// curl_close($ch);

			$register = new Register();

	    $register->first_name = $input['first_name'];
			$register->middle_name = $input['middle_name'];
			$register->last_name = $input['last_name'];
			$register->email = $input['email'];
			$register->mobile = '+63'.$input['mobile'];
			$register->age = $input['age'];
			$register->gender = $input['gender'];
			$register->civil_status = $input['civil_status'];
			$register->address = $input['address'];
			$register->place_of_birth = $input['place_of_birth'];
			$register->date_of_birth = $input['date_of_birth'];
			$register->username = $input['username'];
			$register->password = bcrypt($input['password']);
			$register->role = 'Applicant';
			$register->image = $name;
			$register->verified = 0;
			$register->v_code = $code;
			$register->job_vacancy_id = 0;
			$register->approved = 0;
			$register->hired = 0;
			$register->updated_at = null;

			$register->save();

			$credentials = array(
	    'username' => $input['username'],
	    'password' => $input['password']
			);

			if (Auth::attempt($credentials)) {
				return response()->json($register);
			}
    }

    public function ajaxVerify(Request $request){

		$input = Input::all();
		$account = Register::findOrFail($input['hdn_id']);

		$account->verified = 1;

		$account->save();

		return response()->json(['success'=>'Your account has been successfully verified.']);

	}

    public function checkEmail(Request $request){

		$register = Register::where('email', Input::get('email'))->first();
		if ($register) {
			return response()->json(FALSE);
		} else {
			return response()->json(TRUE);
		}
	}

	public function checkUsername(Request $request){

		$register = Register::where('username', Input::get('username'))->first();
		if ($register) {
			return response()->json(FALSE);
		} else {
			return response()->json(TRUE);
		}
	}
}
