@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
@stop

@section('content')

        @if(session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
        @endif

        <div class="auction-container remove-margin">
            <div class="row">
                <div class="columns small-4">
                    <div class="product-image-container">
                        {{--todo fix product image--}}
                        <img src="http://placehold.it/300x400" alt="">
                        {{--<img src="{{ $auction->product->image }}" alt="">--}}
                    </div>
                </div>

                <div class="columns small-8">
                    <div class="product-details-container">

                        <div class="small-12 columns">
                            <h3>Sweet Merriots Apple</h3>
                            <h5>Apple</h5>
                        </div>

                        <div class="columns small-4">
                            <b>Seller</b>
                            <p>Someperson</p>
                        </div>
                        <div class="columns small-4">
                            <b>Location</b>
                            <p>Someplace</p>
                        </div>

                        <div class="columns small-4">
                            <b>Quantity</b>
                            <p>25 Kg</p>
                        </div>


                        <div class="small-12 columns">
                            <b>Description</b>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequatur explicabo id
                                placeat quas rerum sint veritatis vero voluptatem voluptatibus? Ad cumque dolor dolorem
                                eaque illum iusto magni minus odio quis quo sint suscipit, voluptas?</p>
                        </div>

                        <div class="small-6 columns">
                            <div class="product-amount base-price">
                                <b>Base Price:</b>
                                Rs. 3600/- per Kg
                            </div>
                        </div>
                        <div class="small-6 columns">
                            <div class="product-amount highest-bid">
                                <b>Highest Bid:</b>
                                Rs. 5000/- per Kg
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
                    <h1>Recent Bids</h1>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill pull-xs-right">14</span>
                            Cras justo odio
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill pull-xs-right">2</span>
                            Dapibus ac facilisis in
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill pull-xs-right">1</span>
                            Morbi leo risus
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    {{--todo breadcrumbs--}}

@stop