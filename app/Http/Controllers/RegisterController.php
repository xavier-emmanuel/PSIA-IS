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
		$register->image = $name;
		$register->v_status = 0;
		$register->v_code = intval(rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
		$register->updated_at = null;

		$register->save();

		return response()->json(['success'=>'Registered successfully.']);
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
