@extends('main')

@section('title', '| Contact')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Contact Us</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
        <hr>
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email" name="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="email" name="subject">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control">
            </div>

            <div class="form-group">
                <label for="message" name="message">Message:</label>
                <textarea name="message" id="message" class="form-control">Type your message here...</textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
        </form>
    </div>
</div>

@endsection