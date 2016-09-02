@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+1d'
            });

        });
    </script>

    @include('template.update_varieties')

    @include('template.geolocation')


@stop

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Start Auction</div>

                    <div class="panel-body">
                        {{ Form::open(['action'=>'AuctionController@store']) }}


                            {{--Crop Type--}}
                            <div class="form-group {{ $errors->has('product_id') ?'has-errors':'' }}">
                                <label for="product_id">Product</label>

                                <select name="product_id" id="product_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Please select a Product</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" {{ old('product_id')==$product->id?'selected':'' }}>{{$product->name}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('product_id'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('product_id')}}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--Variety--}}
                            <div class="form-group {{ $errors->has('variety_id') ?'has-errors':'' }}">
                                <label for="variety_id">Variety</label>

                                <select name="variety_id" id="variety_id" class="form-control selectpicker" data-live-search="true" {{$varieties?'disabled="disabled"':''}}>
                                    <option value="" >Please select a variety</option>

                                    @if($varieties)
                                        @foreach($varieties as $variety)
                                        <option value="{{$variety->id}}" {{ old('variety_id')==$variety->id?'selected':'' }}>{{$variety->name}}</option>
                                        @endforeach
                                    @endif

                                </select>

                                @if($errors->has('variety_id'))
                                    <span class="help-block danger">
                                            <strong>{{$errors->first('variety_id')}}</strong>
                                        </span>
                                @endif
                            </div>


                            {{--Description--}}
                            <div class="form-group {{ $errors->has('description') ?'has-errors':'' }}">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Enter Description">{{old('description')}}</textarea>

                                @if($errors->has('description'))
                                    <span class="help-block danger">
                                            <strong>{{$errors->first('description')}}</strong>
                                        </span>
                                @endif
                            </div>


                            {{--Expected Quantity--}}
                            <div class="form-group {{ $errors->has('quantity') ?'has-errors':'' }}">
                                <label for="quantity">Expected Quantity</label>
                                <input type="number" min="10" name="quantity" class="form-control" id="quantity" value="{{ old('quantity')?old('quantity'):10 }}" placeholder="Enter Quantity">
                                <small>Minimum Quantity required: 10Kg</small>

                                @if($errors->has('quantity'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('quantity')}}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--Base Price--}}
                            <div class="form-group {{ $errors->has('base_price') ?'has-errors':'' }}">
                                <label for="base_price">Base Price</label>
                                <input type="number" min="10" name="base_price" class="form-control" id="base_price" value="{{ old('base_price')?old('base_price'):1000 }}" placeholder="Enter Price">
                                <small>Per Kg</small>
                                @if($errors->has('base_price'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('base_price')}}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--Location--}}
                            <div class="form-group {{ $errors->has('location') ?'has-errors':'' }}">
                                <label for="location">Location</label>

                                 <div class="input-group changethisone">
                                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location') }}">
                                    <span class="input-group-addon pointer" onclick="getLocation()">
                                        <i class="glyphicon glyphicon-record "></i>
                                    </span>
                                </div>

                                @if($errors->has('location'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('location')}}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--Last Bidding Date--}}
                            <div class="form-group {{ $errors->has('bidding_end') ?'has-errors':'' }}">
                                <label for="bidding_end">Last Date for Bidding</label>

                                <div class='input-group date' id='datetimepicker'>
                                    <input data-provide="datepicker" readonly type='text' name="bidding_end" class="form-control" id="bidding_end" value="{{ old('bidding_end') }}" placeholder="Enter Date"/>
                                    <span class="input-group-addon pointer">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                                @if($errors->has('bidding_end'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('bidding_end')}}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Start Auction" class="btn-lg btn btn-success full-width">
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop