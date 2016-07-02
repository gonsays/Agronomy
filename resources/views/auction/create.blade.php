@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSuRSONWkdv2Gk7T6G8OEqYNHHarultFw=&libraries=places"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+1d'
            });

        });
    </script>

    <script type="text/javascript">

        var varietySelectElement = $("#variety_id");
        $("#product_id").change(function (e) {

            $.get('{{ action('VarietyController@getVarieties') }}/'+e.target.value,function (data) {

                for(var item in data){
                    if(data.hasOwnProperty(item)){
                        let optionElement = document.createElement("option");
                        optionElement.value = data[item];
                        optionElement.innerText = item;
                        varietySelectElement.append(optionElement);
                    }
                }

                if($.isEmptyObject(data))
                    varietySelectElement.attr('disabled','disabled');
                else
                    varietySelectElement.removeAttr('disabled');

                varietySelectElement.selectpicker('refresh');
            })
        });
    </script>

    <script type="text/javascript">
        function getLocation() {
            var geocoder = new google.maps.Geocoder;
            var locationElement = document.getElementById('location');
            locationElement.disabled = true;

            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition(function (position){

                    console.log(position.coords.latitude+ "  " + position.coords.longitude);
                    var latlng = {lat: position.coords.latitude, lng:  position.coords.longitude};
                    geocoder.geocode({'location': latlng}, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[1]) {
                                locationElement.value = results[1].formatted_address;
                            }
                        }
                    });
                });

            locationElement.disabled = false;

            return false;
        }


    </script>

    <script type="text/javascript">
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: 'in'}
        };


        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    </script>
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
                                <label for="product_id">Crop</label>

                                {{ Form::select('name',$products,null,['class'=>'selectpicker form-control',
                                'data-live-search'=>'true','name'=> 'product_id','id'=>'product_id']) }}

                                @if($errors->has('product_id'))
                                    <span class="help-block danger">
                                        <strong>{{$errors->first('product_id')}}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--Variety--}}
                            <div class="form-group {{ $errors->has('variety_id') ?'has-errors':'' }}">
                                <label for="variety_id">Variety</label>

                                <select name="variety_id" id="variety_id" class="form-control selectpicker" data-live-search="true" disabled>
                                    
                                </select>

                                @if($errors->has('variety_id'))
                                    <span class="help-block danger">
                                            <strong>{{$errors->first('variety_id')}}</strong>
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
                                <input type="number" min="0" name="base_price" class="form-control" id="base_price" value="{{ old('base_price')?old('base_price'):0 }}" placeholder="Enter Price">
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