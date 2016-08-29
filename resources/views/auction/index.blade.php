@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if($auctionList->isEmpty())
                    <h1 class="notification-big text-center">No Results Found</h1>
                    <a href="{{URL::previous()}}" class="pill center btn btn-success">Go Back</a>
                @endif

                @foreach($auctionList as $auction)
                <div class="item-box">
                    <h1>{{ $auction->variety->name }} {{ '@' }} Rs.{{ $auction->base_price }}</h1>
                    <p>Sold By {{ $auction->seller->name }}</p>
                    <p>Product from {{ $auction->location }}</p>
                    <p>Available Quantity: {{ $auction->quantity }} {{ $auction->variety->product->measurement_unit }}</p>
                    <a href="{{ action('AuctionController@show',$auction->id) }}" class="btn btn-lg btn-success">Make a Bid</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop