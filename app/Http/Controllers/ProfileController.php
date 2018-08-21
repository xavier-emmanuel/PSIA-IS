<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Register;

class ProfileController extends Controller
{
    public function ajaxUpdatePhoto(Request $request) {
    	$account = Register::find(Auth::id());

	  	if($request->hasfile('user_image')) {
	  		$file = $request->user_image;
            $image_name = time().$file->getClientOriginalName();
			$file->move(public_path().'/uploads/accounts/', $image_name);

	  		$account->image = $image_name;
			$account->save();
	  	}
		return response()->json(['success'=>'Profile image has been successfully updated.', 'image'=>$image_name]);
    }

    public function ajaxUpdateAccount(Request $request) {
    	$account = Register::find(Auth::id());

    	if(! $request->username == '') {
   			$account->username = $request->username;   			
   		}
   		if(! $request->new_password == '') {
		 	$account->password = bcrypt($request->new_password);   			
   		}
		$account->save();

		return response()->json(['success'=>'User credentials has been successfully updated.']);
    }

    public function ajaxUpdatePersonal(Request $request) {
    	$account = Register::find(Auth::id());

    	$account->first_name = $request->first_name;
    	$account->middle_name = $request->middle_name;
    	$account->last_name = $request->last_name;
    	$account->age = date_diff(date_create($request->date_of_birth), date_create('now'))->y;
    	$account->gender = $request->gender;
    	$account->civil_status = $request->civil_status;
    	$account->date_of_birth = $request->date_of_birth;
    	$account->place_of_birth = $request->place_of_birth;
    	$account->save();
			
		return response()->json(['success'=>'Personal details has been successfully updated.', 'firstname' => $account->first_name, 'age' => $account->age]);
    }

    public function ajaxUpdateContact(Request $request) {
    	$account = Register::find(Auth::id());

    	$account->mobile = '+63'.$request->mobile;
    	$account->email = $request->email;
    	$account->address = $request->address;
    	$account->save();

		return response()->json(['success'=>'Contact details has been successfully updated.']);
    }
}
