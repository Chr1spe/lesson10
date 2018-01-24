<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //

    public function index()
    {

    	$posts = Post::latest()->get();

    	return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
    	//$post = Post::find($id);

    	return view('posts.show',compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	
    	//dd(request()->all());

    	/*$post = new \App\Post;

    	$post->title = request('title');

    	$post->body = request('body');

    	$post->save();*/

    	/*$poststuff = [
    		'title' => request('title'),
    		'body' => request('body')
    	];

    	dd($poststuff);*/

    	$this->validate(request(),[
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	Post::create(request(['title','body']));

    	return redirect('/');

    }
}
