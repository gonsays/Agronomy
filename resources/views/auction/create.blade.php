@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Start Auction</div>
                    <div class="panel-body">
                        <form action="{{ route('auction.store') }}" method="POST" role="form" class="form">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="base_price">Base Price</label>
                                <input type="number" name="base_price" class="form-control" id="base_price" value="{{ old('base_price') }}">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="base_price" value="{{ old('base_price') }}">
                            </div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop