<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winning Bid - Agronomy</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="sub"></div>
        <div class="sub">
            <span>{{ date("Y, m D") }}</span>
        </div>
    </div>

    <article>
        <h1>Congratulations!!</h1>
        <h2>{{ $bidder->name }}</h2>
        <h2>You have won the auction for {{ $variety->name }} ( {{ $product->name  }} ) at a bid price of {{ $bid->amount }}</h2>
        <p>Please click on the link below to visit the auction page and receive the sellers contact details.</p>
        <a href="{{ action('AuctionController@show',$auction->id) }}">Click Here</a>

    </article>



    <footer>
        <h3>Thank you for using Agronomy</h3>
    </footer>
</body>
</html>