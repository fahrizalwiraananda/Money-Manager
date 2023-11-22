<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function get(){
        return view('login');
    }

    public function attempt(Request $request){
        $validateData = $request->validate([

            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required']       
            
        ]);


        $email = $request->email;
        $password = $request->password;
    
        $user = new User();
        $finduser = $user->where('email', $email)->first();
    

        $isUserFound = Auth::validate([
            'email' => $email,
            'password'=> $password
        ]);


        if($isUserFound == false){
            return redirect('/login')->withErrors([
                'auth' => 'Email or password is not found'
            ]);
        }
    
        Auth::attempt([
            'email' => $email,
            'password'=> $password
        ]);
    
        return redirect('/');
    }
}
