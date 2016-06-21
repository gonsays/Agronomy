@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @foreach($auctionList as $auction)
                <div class="item-box">
                    <h1>{{ $auction->product->name }} {{ '@' }} Rs.{{ $auction->base_price }}</h1>
                    <p>Sold By {{ $auction->seller->name }}</p>
                    <p>Product from {{ $auction->location }}</p>
                    <p>Available Quantity: {{ $auction->quantity }} {{ $auction->product->measurement_unit }}</p>
                    <a href="{{ action('AuctionController@show',$auction->id) }}" class="btn btn-lg btn-success">Make a Bid</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop