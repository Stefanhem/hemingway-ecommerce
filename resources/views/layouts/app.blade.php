<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <meta charset="utf-8">
    <title>Hemingway</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{asset("css/normalize.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/webflow.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/hemingway-f9fff6.webflow.css")}}" rel="stylesheet" type="text/css">
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{asset("images/favicon.ico")}}" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset("images/webclip.png")}}" rel="apple-touch-icon">

    <!-- Styles -->
</head>
<body>
    <div id = "app">
        @include('partials.nav-bar')
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5f07151d42e7a881402404db" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset("js/webflow.js")}}" type="text/javascript"></script>
    <script src="{{asset('js/hemingway.js')}}"  type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    <!--  FOXYCART  -->
    <script data-cfasync="false" src="https://cdn.foxycart.com/hemingway/loader.js" async="" defer=""></script>
    <!--  /FOXYCART  -->
</body>
</html>
