<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('id', 'desc')->take(6)->get();
		return view('pages.welcome')->with('posts', $posts);
	}

	public function getAbout() {
		$first = "Daisho";
		$last = "Komiyama";
		$full = $first . " " . $last;
		$email = "quebec3.com@gmail.com";
		$data = [];
		$data['fullname'] = $full;
		$data['email'] = $email;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'email_extra' => 'max:0',
			'subject' => 'min:3',
			'message' => 'min:10'
		]);

		$data = [
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		];

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('quebec3.com@gmail.com');
			// $message->to('smtp.mailtrap.io');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'メールはうまいこと送られました。');

		return redirect('/');
	}
}