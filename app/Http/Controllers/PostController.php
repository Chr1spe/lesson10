<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    //

    public function index(Posts $posts)
    {

        //return session('message');

        $posts = $posts->all();

    	/*$posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();*/

        //$archives = Post::archives();


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


        /*
    	Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()]);*/

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now been published.');

    	return redirect('/');

    }
}

