<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest',['except'=> 'destroy']);
    }

    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
        //attempt to authenticate
        if(! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'please check your credentials'
            ]);
        }


        //redirect home
        return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();
        //dd("tried to log out");

    	return redirect()->home();
    }
}
