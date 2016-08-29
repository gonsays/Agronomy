@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
@stop

@section('content')

        @if(session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif

        <div class="auction-container remove-margin">
            <div class="row">
                <div class="columns small-4">
                    <div class="product-image-container">
                        {{--todo fix product image--}}
                        <img src="/img/red_delicious.jpg" alt="">
                        {{--<img src="{{ $auction->product->image }}" alt="">--}}
                    </div>
                </div>

                <div class="columns small-8">
                    <div class="product-details-container">

                        <div class="small-12 columns">
                            <h3>{{ $auction->variety->name }}</h3>
                            <h5>Apple</h5>
                        </div>

                        <div class="columns small-4">
                            <b>Seller</b>
                            <p>{{ $auction->seller->name }}</p>
                        </div>
                        <div class="columns small-4">
                            <b>Location</b>
                            <p>{{ $auction->location }}</p>
                        </div>

                        <div class="columns small-4">
                            <b>Quantity</b>
                            <p>{{ $auction->quantity }}</p>
                        </div>


                        <div class="small-12 columns">
                            <b>Description</b>
                            <p>{{ $auction->description }}</p>
                        </div>

                        <div class="small-6 columns">
                            <div class="product-amount base-price">
                                <b>Base Price:</b>
                                Rs. {{ $auction->base_price }}/- per Kg
                            </div>
                        </div>
                        <div class="small-6 columns">
                            <div class="product-amount highest-bid">
                                <b>Highest Bid:</b>
                                @if($highestBid)
                                    Rs. {{ $highestBid }}/- per Kg
                                @else
                                    No Bids yet
                                @endif
                            </div>
                        </div>

                        <div class="bidding-container">
                            <div class="small-8 columns">
                                <select name="bid_amount" id="bid_amount" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Rs. 3000</option>
                                    <option value="">Rs. 4000</option>
                                    <option value="">Rs. 5000</option>
                                    <option value="">Rs. 6000</option>
                                </select>
                            </div>

                            <div class="small-4 columns">
                                <a class="btn btn-success btn-bid">Make a Bid</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="bids-view-container">
            <div class="row">
                <div class="small-6 columns">


                    @if($bids->isEmpty())
                        <h1 class="notification-med">No Bids Yet</h1>
                        <hr>
                    @else
                        <h1>Recent Bids</h1>
                        <hr>
                        <ul class="list-group">
                            @foreach($bids as $bid)
                                <li class="list-group-item">
                                    <span class="tag tag-default tag-pill pull-xs-right">{{ $bid->amount }}</span>
                                    {{ $bid->seller }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

    {{--todo breadcrumbs--}}

@stop