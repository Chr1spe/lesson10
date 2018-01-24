<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	// Validate
    	$this->validate(request(),[
    		'name' = 'required',
    		'email' = 'required|email',
    		'password' = 'required'
    	])
    }

    //Create and save
    User::create(request(['name', 'email', 'password']));

    //Sign in

    //Redirect
}
