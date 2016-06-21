@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Auction #{{ $auction->id }}</div>

                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>Product</td>
                                    <td>{{ $auction->product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Seller Name</td>
                                    <td>{{ $auction->seller->name }}</td>
                                </tr>

                                <tr>
                                    <td>Base Price</td>
                                    <td>Rs. {{ $auction->base_price }}</td>
                                </tr>

                                <tr>
                                    <td>Location</td>
                                    <td>{{ $auction->location }}</td>
                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td>{{ $auction->status }}</td>
                                </tr>

                                <tr>
                                    <td>Auction ends on</td>
                                    <td>{{ $auction->bidding_end }}</td>
                                </tr>

                                <tr>
                                    <td>Auction Started on</td>
                                    <td>{{ $auction->created_at }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>


@stop