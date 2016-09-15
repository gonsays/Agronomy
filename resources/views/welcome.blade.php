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
                <div class="form-container">
                    <h1 class="text-center">Find your Product Instantly!</h1>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ action('AuctionController@search') }}" method="post" class="text-center">
                        <div class="row">
                            <div class="columns small-3">
                                <div class="input-group changethisone">
                                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location') }}">
                                    <span class="input-group-addon pointer" onclick="getLocation()">
                                        <i class="glyphicon glyphicon-record "></i>
                                    </span>
                                </div>
                            </div>
                            <div class="columns small-3">
                                {{ Form::select('name',$products,1,['class'=>'selectpicker form-control',
                                'data-live-search'=>'true','name'=> 'product_id','id'=>'product_id']) }}
                            </div>

                            <div class="columns small-3">
                                <select name="variety_id" id="variety_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach($varieties as $id=>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="columns small-3">
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
    @include('template.geolocation', ['precision'=>5])
    @include('template.update_varieties')
@stop
