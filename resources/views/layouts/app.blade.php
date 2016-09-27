<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{ Html::favicon('/img/favicon/favicon.ico') }}

    <meta name="apple-mobile-web-app-title" content="Agronomy">
    <meta name="application-name" content="Agronomy">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <title>Agronomy</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Styles -->
    {{ Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css' ,[],true ) }}
    {{ Html::style('/bower_components/foundation-sites/dist/foundation.min.css',[],true) }}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}

     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">


    @yield('head')
</head>

<body id="app-layout">

    <div class="wrapper">
    @include('template.nav')


    @yield('content')
        
        
    
    {{--<footer>--}}
        {{--<div class="row">--}}
            {{--<div class="small-12 columns">--}}
                {{--<ul class="small-block-grid-5">--}}
                    {{--<li><a href="">Lorem.</a></li>--}}
                    {{--<li><a href="">Consequuntur!</a></li>--}}
                    {{--<li><a href="">Repellendus.</a></li>--}}
                    {{--<li><a href="">Aliquam?</a></li>--}}
                    {{--<li><a href="">Nesciunt.</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</footer>--}}

    <!-- JavaScripts -->
        {{ Html::script('/bower_components/jquery/dist/jquery.min.js') }}
        {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </div>

    @yield('scripts')
</body>
</html>
