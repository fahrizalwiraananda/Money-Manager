<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class UpdateActivityController extends Controller
{
    public function get(Request $request, $id) {
        $activity = new Activity();
        $result = $activity->where('id', $id)->get()->first();
        $desc = $result->description;
        $nominal = $result->nominal;

        return view('update', [
            'description'=>$desc,
            'nominal'=>$nominal
        ]);
    }
                                                                                                                                              
    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'description' => ['required', 'max:100'],
            'nominal' => ['required']
        ]);


        $desc = $validateData['description'];
        $nominal = $validateData['nominal'];

        $desc = $request->description;
        $nominal = $request->nominal;
        
        $activity = new Activity();
        $activity->where('id', $id)->update([
            'description'=>$desc,
            'nominal'=>$nominal
        ]);

        return redirect('/');
    }
}
