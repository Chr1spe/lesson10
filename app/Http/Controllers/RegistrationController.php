<?php

namespace App\Http\Controllers;

//use App\User;
//use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;


class RegistrationController extends Controller
{
    //
    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
    	// Validate
        /*
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);
        */

        /*
	    //Create and save
    	$user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	//Sign in

    	auth()->login($user);

        \Mail::to($user)->send(new Welcome($user)); 
        */

    	//Redirect

        $form->persist();

        session()->flash('message','Thanks so much for signing up!');

    	return redirect()->home();
	}

}
