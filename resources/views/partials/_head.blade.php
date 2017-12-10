<!-- Required meta tags -->
<meta charset="utf-8">
<!-- Instruct Internet Explorer to use its latest rendering engine -->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Quebec3 - 海外移住ポータル@yield('title')</title>
<meta name="description" content="海外移住, カナダ移住, ケベック州, モントリオール, 英会話, ブログ, @yield('desc')フランス語">
<!-- FB open graph tags-->
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:site_name" content="Quebec3 - 海外移住ポータル" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{ mb_substr(strip_tags($post->body), 0, 50) }}" />
<meta property="og:image" content="{{ asset('images/' . $post->slug . '/' . $post->image) }}" />
<meta property="og:image:width" content="400" />
<link rel="canonical" href="{{ url()->current() }}" />

{{ Html::style('css/app.css') }}

@yield('stylesheets')