<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->paginate(4);
		return view('blog.index')->with('posts', $posts);
	}

	public function getSingle($slug) {
		//Fetch from the DB based on the slug
		$post = Post::where('slug', '=', $slug)->first();

		//Return the view and pass in the object
		return view('blog.single')->with('post', $post);
	}
}
