<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\User;

class HomeControler extends Controller
{
    public function get(){

        $userId = Auth::id();

        if($userId = null){

            return view('welcome', [
                'activities' =>[]
            ]);

        }

        $user = User::all();

        $activity = new Activity();

        $activity->userId = $userId;

        $activities = $activity->get();


        $income = $activity->where('nominal', '>',0)->sum('nominal');
        $expense = $activity->where('nominal', '<',0)->sum('nominal');
       

        return view('welcome', [
            'activities' => $activities,
            'income' => $income,
            'expense' => $expense * -1
            ])->with(['user' => Auth::user(),
        ]);
    }
}
