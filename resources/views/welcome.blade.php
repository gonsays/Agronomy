@extends('layouts.app')

@section('content')

        {{--Cover--}}
        <div class="cover remove-margin">
            <div class="row">
                <div class="columns small-12">
                    <div class="cloud"></div>
                </div>
            </div>
        </div>


    {{--Search--}}
    <div class="container_search">
        <div class="row">
            <div class="small-12 columns small-centered">
                <div class="form-container text-center">
                    <h1>Find your Product Instantly!</h1>
                    <form action="{{ action('ProductController@index') }}" method="post">
                        <div class="row">
                            <div class="columns small-5">
                                <div class="input-group changethisone">
                                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location') }}">
                                    <span class="input-group-addon pointer" onclick="getLocation()">
                                        <i class="glyphicon glyphicon-record "></i>
                                    </span>
                                </div>
                            </div>
                            <div class="columns small-5">
                                {{ Form::select('name',$products,null,['class'=>'selectpicker form-control',
                                'data-live-search'=>'true','name'=> 'product_id','id'=>'product_id']) }}
                            </div>
                            <div class="columns small-2">
                                <input type="submit" value="Search" class="btn btn-success">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    @include('template.geolocation')
@stop
