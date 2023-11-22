<?php

namespace App\Http\Controllers;
use App\Models\EvaForm;

use Illuminate\Http\Request;

class EvaFormController extends Controller
{
    public function get() {
        return view('eva');
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'fullname' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'sources' => ['required']

        ]);

        $languageSources = implode(', ', $validateData['sources']);

        return view('confirm');
    }

    public function confirm() {

        return view('confirm');

    }
}
