@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ action('AuctionController@create') }}" class="btn btn-lg btn-primary btn-block">Start an Auction</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ action('AuctionController@index') }}" class="btn btn-lg btn-primary btn-block">Browse Auctions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
