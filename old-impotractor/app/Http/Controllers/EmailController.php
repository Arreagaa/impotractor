<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;

class EmailController extends Controller
{
  public function sendMail(Request $request) {
    $firstName = request()->first_name;
    $lastName = request()->last_name;
    $e_mail = request()->email;
    $msg = request()->message;

    $validate = Validator::make(Input::all(), [
    	'g-recaptcha-response' => 'required|captcha'
    ]);

    if ($validate->fails()) {
      session()->flash('mailNotSent', 'La sabemos! Usted es un robot!');
      return redirect()->to('/#contacto');
    } else {
      Mail::to(['ale.crts1996@gmail.com'])->send(new \App\Mail\ContactUs($firstName, $lastName, $e_mail, $msg));
      session()->flash('mailSent', 'Su mensaje fue enviado correctamente');
      return redirect()->to('/#contacto');
    }
  }
}
