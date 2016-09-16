@extends('layouts.app')

@section('content')

    @include('user.templates.account-navigation',['active'=>3])

    <div class="row">
        <div class="small-12 columns">

            @if($bids->isEmpty())
                <h1 class="notification-big text-center">No Results Found</h1>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Variety</th>
                        <th>Amount</th>
                        <th>Bidded On</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($bids as $bid)
                        <tr>
                            <td>{{ $bid->auction->variety->product->name }}</td>
                            <td>{{ $bid->auction->variety->name }}</td>
                            <td>{{ $bid->amount }}</td>
                            <td>{{ date('F d, Y h:m', strtotime($bid->created_at)) }}</td>
                            <td>{{ $bid->status }}</td>
                            <td><a href="{{ action('AuctionController@show', $bid->auction->id ) }}" target="_blank">View Item</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection