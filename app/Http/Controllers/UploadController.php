<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function post(Request $request)
{
    $validateFile = $request->validate([
        'file' => ['required', 'mimes:xlsx', 'max:2048']
    ]);

    $file = $validateFile['file'];
    
    $file->getClientOriginalName();
    $file->getClientOriginalExtension();
    $file->getRealPath();
    $file->getSize();
    $file->getMimeType();

    dd($file);
    }
}
