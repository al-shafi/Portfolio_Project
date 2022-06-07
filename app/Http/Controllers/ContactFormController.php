<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function store(){
        $contact_form_data = $request->all();
        Mail::to('pmd.shafi28@gmail.com')->send(new ContactFormMail($contact_form_data));
    }
}
