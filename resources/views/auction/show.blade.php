@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="/bower_components/sweetalert/dist/sweetalert.css" />
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/bower_components/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        var $customBid = $("#input-custom-bid");
        var $bidAmount = $("#bid_amount");
        $bidAmount.change(function (e) {
            if(this.value == "custom" ){
                $customBid.removeAttr('disabled');
                $customBid.removeClass("hide");
                $customBid.show();
            }
            else if($customBid.is(":visible")){
                $customBid.hide();
                $customBid.attr('disabled','disabled');
            }
        });
    </script>

    <script type="text/javascript">

        var $formBid = $("#form_bid");

        $formBid.submit(function (e) {
            e.preventDefault();

            var $data = $(this).serialize();

            $.post($formBid.attr('action'), $data).done(function (data) {
                swal("Success!",
                        data, "success");
                location.reload();
            })
            .fail(function (data) {
                var message = JSON.parse(data.responseText);


                swal("Oops!", message.bid_amount[0], "error");
            });
        })
    </script>

    <script type="text/javascript">
        var $customBid = $("#input-custom-bid");
        var $selectedOption = $("#option_custom");

        $customBid.keyup(function () {
            var amount = $(this).val();
            $selectedOption.val(amount);
        });
    </script>

    <script type="text/javascript">
        function endAuction(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "The auction Will close if u choose to continue",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, end it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
                    function(isConfirm){
                        if (isConfirm) {
                            closeAuction(function () {
                                swal("Ended!", "Your auction has ended!", "success");
                                window.location.reload();
                            });
                            return true;
                        } else {
                            swal("Cancelled", "Your auction is still active", "error");
                            return false;
                        }
            });
        }
    </script>

    <script type="text/javascript">
        function closeAuction(callback) {
            $ = jQuery;

            let url = "{{ action("AuctionController@destroy",$auction->id) }}";

            $.post( url, { "_method":"DELETE" },function (data) {
                console.log(data);
            })
                .done(function() {
                    callback.call();
                })
                .fail(function() {
                    swal("Oops!", "Something went wrong!", "error")
                });
        }
    </script>
@stop

@section('content')

        <div class="auction-container remove-margin">
            <div class="row">
                <div class="columns small-4">
                    <div class="product-image-container">
                        {{--todo fix product image--}}
                        <img src="{{ Storage::url($auction->variety->image) }}" alt="">
                    </div>
                </div>

                <div class="columns small-8">
                    <div class="product-details-container {{ !Auth::check() ? 'overflow-auto':'' }}">

                        @if($auction->status == "Closed")
                            <div class="alert alert-danger">This Auction has Ended</div>
                        @endif

                        <div class="small-12 columns">
                            @if($auction->status != "Closed" && Auth::user() == $auction->seller)
                                <a href="#" class="btn btn-default btn-sm btn-end-auction" onclick="endAuction(event)">End Auction</a>
                            @endif

                            <h3>{{ $auction->variety->name }}</h3>
                            <h5>{{ $auction->variety->product->name }}</h5>
                        </div>

                        <hr>

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
                            <p>{{ $auction->quantity }} Kg</p>
                        </div>


                        <div class="small-12 columns">
                            <b>Description</b>
                            <p>{{ $auction->description }}</p>
                        </div>


                        @if($auction->status == "Open")
                            <div class="small-6 columns">
                                <b>Bidding ends on</b>
                                <p>{{ $auction->bidding_end }}</p>
                            </div>

                            <div class="small-6 columns">
                                <div class="alert alert-warning">
                                    @if($daysLeft)
                                        {{ $daysLeft }} days to go
                                    @elseif($hoursLeft)
                                        {{ $hoursLeft }} hours to go
                                    @else
                                        {{ $minLeft }} minutes to go
                                    @endif
                                </div>
                            </div>

                        @else
                            <div class="small-12 columns">
                                <p>The bidding period has ended for this product</p>
                            </div>
                        @endif


                        <div class="small-6 columns">
                            <div class="product-amount base-price">
                                <b>Base Price:</b>
                                Rs. {{ $auction->base_price }}/-
                            </div>
                        </div>
                        <div class="small-6 columns">
                            <div class="product-amount highest-bid">
                                <b>Highest Bid:</b>
                                @if($highestBid)
                                    Rs. {{ $highestBid }}/-
                                @else
                                    No Bids yet
                                @endif
                            </div>
                        </div>


                        @if(Auth::user() != $auction->seller && $daysLeft>0 && Auth::check())
                        {{--Bidding Form--}}
                        <div class="bidding-container">
                            <form action="{{ action("BidController@store") }}" method="post" id="form_bid">

                                <input type="hidden" name="auction_id" value="{{ $auction->id }}">

                                <div class="small-4 columns">
                                    <select name="bid_amount" id="bid_amount" class="form-control selectpicker" data-live-search="true">
                                        @foreach($suggestedBids as $amount)
                                            <option value="{{ $amount }}">Rs. {{ $amount }}</option>
                                        @endforeach
                                        <option value="custom" id="option_custom">Custom</option>
                                    </select>
                                </div>

                                <div class="small-4 columns">
                                    <input type="text" id="input-custom-bid" class="form-control hide" disabled placeholder="Rs.">
                                </div>

                                <div class="small-4 columns">
                                    <input type="submit" value="Make Bid" class="btn btn-success btn-bid">
                                </div>
                            </form>
                        </div>
                        @endif


                    </div>
                </div>
            </div>


        </div>

        <div class="bids-view-container">
            <div class="row">

                <div class="small-12 columns">
                    @if($auction->hasEnded())

                        {{--Display no bids--}}
                        @if($bids->isEmpty())
                            <div class="alert alert-primary">
                                This auction didn't receive any bids.
                            </div>

                        @else
                            {{--Diplay Winning Bid--}}
                            <div class="alert alert-success">This Bid has been won by
                                {{ link_to('foo/bar', $bids->first()->bidder->username) }} {{--todo link to bidder account--}}
                                for a sum of Rs. {{ $bids->first()->amount }}.
                            </div>
                        @endif

                    @endif
                </div>

                <div class="small-6 columns">

                    @if($bids->isEmpty())
                        <h1 class="notification-med">No Bids Yet</h1>
                        <hr>
                    @else
                        <h1>Top Bids</h1>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Bidder</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($bids as $bid)
                                <tr>
                                    <td>{{ $bid->bidder->username }}</td>
                                    <td>{{ $bid->amount }}</td>
                                    <td>{{ $bid->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <ul class="list-group">

                        </ul>
                    @endif
                </div>
            </div>
        </div>

    {{--todo breadcrumbs--}}

@stop