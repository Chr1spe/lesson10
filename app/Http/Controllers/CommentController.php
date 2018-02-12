<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

	public function store(Post $post)
	{
		/*Comment::create([
			'body' => request('body'),
			'post_id' => $post->id
		]);*/

		$this->validate(request(),['body' => 'required']);

		$post->addComment(request('body'), Auth::user());

		return back();
	}

}
