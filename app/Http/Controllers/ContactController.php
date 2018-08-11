<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Mail\ContactUs;
use Mail;

class ContactController extends Controller
{

    public function contactSend(Request $request) {

			Mail::to('pattonsecu@gmail.com')->send(new ContactUs($request->contact_name, $request->contact_email, $request->contact_subject, $request->message));

	    return response()->json(['success' => 'Thanks for contacting us!']);
   	}
}
