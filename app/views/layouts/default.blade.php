@extends('layouts.base')

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title }} - Laravel</title>
    <meta name="description" content="{{ $description }}">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
    <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
@stop

@section('body')
    <header>
        <div class="container">
            <a href="{{ route('home') }}" title="Laravel PHP Framework" class="logo">&nbsp;</a>
            <nav class="menu">
                <ul>
                    <li class="active"><a href="{{ route('home') }}" title="Welcome">Welcome</a></li>
                    <li><a href="{{ route('docs') }}" title="Documentation">Documentation</a></li>
                    <li><a href="#">API</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </nav>
        </div>
    </header>


    @yield('content')

    <footer>
        <div class="container">
            <a href="{{ route('home') }}" title="Laravel PHP Framework" class="logo"><img src="{{ asset('img/footer_logo.png') }}" alt="Laravel PHP Framework"></a>
            <nav class="menu">
                <ul>
                    <li><a href="{{ route('home') }}" title="Welcome">Welcome</a></li>
                    <li><a href="{{ route('docs') }}" title="Documentation">Documentation</a></li>
                    <li><a href="#">API</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </nav>
            <p class="copyright">Copyright &copy; 2013 Taylor Otwell. Site designed by Casserole Labs &amp; Dayle Rees.</p>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.9.1.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    @yield('scripts')
    <script>
        var _gaq=[['_setAccount','{{ $analytics }}'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
@stop