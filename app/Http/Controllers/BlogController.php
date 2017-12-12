<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getIndex() {
		$posts = Post::orderBy('id', 'desc')->paginate(10);
		return view('blog.index')->with('posts', $posts);
	}

	public function getSingle($slug) {
		//Fetch from the DB based on the slug
		$post = Post::where('slug', '=', $slug)->first();

		//Pagination next and previous
		$next = Post::orderBy("created_at")->where('created_at', '>', $post->created_at)->first();
		$previous = Post::orderBy("created_at", 'desc')->where('created_at', '<', $post->created_at)->first();

		//Return the view and pass in the object
		return view('blog.single')->with('post', $post)->with('next', $next)->with('previous', $previous);
	}
}