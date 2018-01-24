<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	// Validate
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

	    //Create and save
    	$user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	//Sign in

    	auth()->login($user);

    	//Redirect

    	return redirect()->home();
	}

}
