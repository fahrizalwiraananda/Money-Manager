<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function get() {
        return view('contact');
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'fullname' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'gender' => ['required'],
            'message' => ['required'],
            'type' => ['required'],
            'sources' => ['required']

        ]);

        //explode untuk ubah array jadi string

        $incomeSources = implode(', ', $validateData['sources']);

        $contact = new Contact();
        $contact->fullname = $validateData['fullname'];
        $contact->email = $validateData['email'];
        $contact->message = $validateData['message'];
        $contact->gender = $validateData['gender'];
        $contact->type = $validateData['type'];
        $contact->income_sources = $incomeSources;

        $contact->save();

        dd($validateData);

        //return back();
    }
}
