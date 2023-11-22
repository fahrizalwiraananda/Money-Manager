<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ActivityController extends Controller
{
    public function store(Request $request) {

        $validateData = $request->validate([
            'description' => ['required', 'max:100'],
            'nominal' => ['required', 'integer']
        ]);



        $description = $validateData['description'];
        $nominal = $validateData['nominal'];
        $userId = Auth::id();

        $activity = new Activity();
        $activity->description = $description;
        $activity->nominal = $nominal;
        $activity->userId = $userId;

        $activity->save();


        return redirect('/');
    }

    public function delete(Request $request) {
        $id =$request->id;

        $activity = new Activity();
        $activity->where('id', $id)->delete();

        return redirect('/');
    }
}
