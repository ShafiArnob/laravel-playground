<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('form');
    }

    public function register(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>"required|confirmed",
                'password_confirmation'=> 'required'
            ]
        );
        // if the name in the form is different in password we can use in the confirm_pass same:<confirm password input>
        
        echo "<pre>";
        print_r($request->all());
    }
}
