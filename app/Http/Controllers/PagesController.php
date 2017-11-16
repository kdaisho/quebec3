<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('id', 'desc')->take(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout() {
        $first = "Daisho";
        $last = "Komiyama";
        $full = $first . " " . $last;
        $email = "info@daishodesign.com";
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
            $message->to('info@daishodesign.com');
            // $message->to('smtp.mailtrap.io');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent!');

        return redirect('/');
    }
}