<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,400,900" rel="stylesheet" type="text/css">
    
    @yield('head')
</head>
<body>

    <div class="container">
        @yield('body')
    </div>

    
</body>
</html>