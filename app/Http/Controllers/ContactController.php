<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Mail\ContactUs;
use Mail;

class ContactController extends Controller
{

    public function contactSend(Request $request) {

			Mail::to('pattonsecu@gmail.com')->send(new ContactUs($input['contact_name'], $input['contact_email'], $input['contact_subject'], $input['message']));

	    return response()->json(['success' => 'Thanks for contacting us!']);
   	}
}
