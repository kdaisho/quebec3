<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;
use File;

class PostController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//Create a variable and store all the blog posts in it from the database
		$posts = Post::orderBy('id', 'desc')->paginate(6);

		//Retrun a view and pass in the above variable
		return view('posts.index')->with('posts', $posts);
		// return view('posts.index')->withPosts($posts));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('posts.create')->with('categories', $categories)->with('tags', $tags);;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//Store in the database
		$post = new Post;

		//Validate the data
		$this->validate($request, array(
			'title' => 'required|max:255',
			'slug' => 'required|alpha_dash|min:5|max:255|unique:posts',
			'category_id' => 'required|numeric',
			'is_online' => 'required|numeric',
			'body' => 'required',
			'featured_image' => 'sometimes|image'
		));

		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->category_id = $request->category_id;
		$post->is_online = $request->is_online;
		$post->body = Purifier::clean($request->body, 'youtube');

		if($request->hasFile('featured_image')) {
			$types = ['-original.', '-thumb.'];
			// Width and height for thumb and resized
			$sizes = [['128', '128']];
			$targetPath = public_path() . '/images/';

			$image = $request->file('featured_image');

			// $filename = time() . '.' . $image->getClientOriginalExtension();
			// $location = public_path('images/') . $filename;
			// // Image::make($image)->resize(640, null)->save($location);
			// Image::make($image)->resize(640, null, function ($constraint) {
			// $constraint->aspectRatio();
			// })->save($location);

			// $post->image = $filename;


			$filename = time() . '.' . $image->getClientOriginalName();
			$ext =  $image->getClientOriginalExtension();
			$nameWithOutExt = str_replace('.' . $ext, '', $filename);
			$original = $nameWithOutExt . array_shift($types) . $ext;
			$image->move($targetPath, $original); // Move the original one first

			foreach ($types as $key => $type) {
				// Copy and move (thumb, resized)
				$newName = $nameWithOutExt . $type . $ext;
				File::copy($targetPath . $original, $targetPath . $newName);
				Image::make($targetPath . $newName)->resize(null, 128, function ($constraint) {
					$constraint->aspectRatio();
				})->crop($sizes[$key][0], $sizes[$key][1])
				->save($targetPath . $newName);
			}

			$post->image = $nameWithOutExt;

		}

		$post->save();

		$post->tags()->sync($request->tags, false);

		Session::flash('success', 'The blog post was successfully saved!');

		return redirect()->route('posts.show', $post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return view('posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//Find the post in the database and save in a variable
		$post = Post::find($id);
		$categories = Category::all();
		$cats = [];
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		$tags = Tag::all();
		$tags2 = [];
		foreach($tags as $tag) {
			$tags2[$tag->id] = $tag->name;
		}

		//Return the view and pass in the variable we previously created
		return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$post = Post::find($id);

		$this->validate($request, array(
			'title' => 'required|max:255',
			'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
			'category_id' => 'required|integer',
			'is_online' => 'required|numeric',
			'body' => 'required',
			'featured_image' => 'image'
		));


		//Save the data to the database
		$post = Post::find($id);

		$post->title = $request->input('title');
		$post->slug = $request->input('slug');
		$post->category_id = $request->input('category_id');
		$post->is_online = $request->is_online;
		$post->body = Purifier::clean($request->body, 'youtube');

		if($request->hasFile('featured_image')) {

			$types = ['-original.', '-thumb.'];
			// Width and height for thumb and resized
			$sizes = [['128', '128']];
			$targetPath = 'images/';

			$image = $request->file('featured_image');
			$filename = time() . '.' . $image->getClientOriginalName();
			$ext =  $image->getClientOriginalExtension();
			$nameWithOutExt = str_replace('.' . $ext, '', $filename);
			$original = $nameWithOutExt . array_shift($types) . $ext;
			$image->move($targetPath, $original); // Move the original one first

			foreach ($types as $key => $type) {
				// Copy and move (thumb, resized)
				$newName = $nameWithOutExt . $type . $ext;
				File::copy($targetPath . $original, $targetPath . $newName);
				Image::make($targetPath . $newName)->resize(null, 128, function ($constraint) {
					$constraint->aspectRatio();
				})->crop($sizes[$key][0], $sizes[$key][1])
				->save($targetPath . $newName);
			}

			$oldFilename[0] = $post->image . '-original.jpg';
			$oldFilename[1] = $post->image . '-thumb.jpg';
			// Update the database
			$post->image = $nameWithOutExt;
			// Delete the image
			for ($i = 0; $i < 2; $i++) {
				Storage::delete($oldFilename[$i]);
			}
		}


		$post->save();

		$post->tags()->sync($request->tags);

		//Set flash data with success message
		Session::flash('success', 'This post was successfully updated!');

		//Redirect with flash data to posts.show
		return redirect()->route('posts.show', $post->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->tags()->detach();
		Storage::delete($post->image);

		$post->delete();

		Session::flash('success', 'The post was successfully deleted.');
		return redirect()->route('posts.index');
	}
}
