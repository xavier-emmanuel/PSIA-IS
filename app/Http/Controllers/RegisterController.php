<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

		$code = intval(rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
		
		$ch = curl_init();
		$parameters = array(
		    'apikey' => '9a904a2b4f629e2fd4fbac04ef75a2fe', //Your API KEY
		    'number' => ''.$input['mobile'].'',
		    'message' => 'This is Patton Security & Investigation Agency. Your verification code is '.$code.'.',
		    'sendername' => ''
		);
		curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		$register = new Register();

    	$register->first_name = $input['first_name'];
		$register->middle_name = $input['middle_name'];
		$register->last_name = $input['last_name'];
		$register->email = $input['email'];
		$register->mobile = $input['mobile'];
		$register->age = $input['age'];
		$register->gender = $input['gender'];
		$register->civil_status = $input['civil_status'];
		$register->address = $input['address'];
		$register->place_of_birth = $input['place_of_birth'];
		$register->date_of_birth = $input['date_of_birth'];
		$register->username = $input['username'];
		$register->password = bcrypt($input['password']);
		$register->image = $name;
		$register->verified = 0;
		$register->v_code = $code;
		$register->job_vacancy_id = 0;
		$register->approved = 0;
		$register->hired = 0;
		$register->updated_at = null;

		$register->save();

		return response()->json($output);
    }

    public function ajaxVerify(Request $request){

		$input = Input::all();
		$account = Register::findOrFail($input['hdn_id']);

		$account->v_status = 1;

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
