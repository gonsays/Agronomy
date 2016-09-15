@extends('layouts.app')

@section('head')
    <style>
        body{
            background: url("http://atextures.com/wp-content/uploads/2014/08/Wooden-Background-36.jpg");
        }
    </style>
@endsection

@section('content')

    @include('user.templates.account-navigation',['active'=>2])

    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-12 columns">

                    @if($auctions->isEmpty())
                        <h1 class="notification-big text-center">No Results Found</h1>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Variety</th>
                                <th>Base Price</th>
                                <th>Auction Started On</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($auctions as $auction)
                                <tr>
                                    <td>{{ $auction->variety->product->name }}</td>
                                    <td>{{ $auction->variety->name }}</td>
                                    <td>{{ $auction->base_price }}</td>
                                    <td>{{ $auction->created_at->toDateString() }}</td>
                                    <td>{{ $auction->status }}</td>
                                    <td><a href="{{ action('AuctionController@show', $auction->id ) }}" target="_blank">View Item</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection