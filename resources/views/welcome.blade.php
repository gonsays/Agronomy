@extends('layouts.app')

@section('content')

    <div id="slider" class="">
        @for($i=1;$i<=5;$i++)
           <img src="" data-src="/img/slide_{{$i}}.jpg" alt="">
        @endfor
    </div>

{{--Search--}}
    <div class="container_search">
        <div class="row">
            <div class="small-10 columns small-centered">
                <div class="form-container shadow">
                    <h1 class="text-center font-handwritten">Find your Product Instantly!</h1>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ action('AuctionController@search',[],false) }}" method="post" class="text-center">
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
                                    <option value="">All Varieties</option>
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


    <div class="background-image">
        <div class="container shadow">

            <div class="row">
                <div class="small-12 columns">
                    <h1 class="font-handwritten">Most Recent Auctions</h1>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <ul class="large-up-4">
                        @foreach($topAuctions as $auction)
                            <li class="column">
                                <a href="{{ action('AuctionController@show',$auction->id) }}" class="item-box">

                                    <div class="image-box" style="background-image: url('{{ Storage::url($auction->variety->image) }}')"></div>

                                    <div class="details-box">
                                        <b>{{ $auction->variety->name }} ({{ $auction->variety->product->name }})</b>
                                        <small>Sold By {{ $auction->seller->name }}</small>
                                        <h4>Rs.{{ $auction->base_price }}</h4>
                                        <h2  class="btn btn-md btn-view-item">View Item</h2>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>




@endsection

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ideal-image-slider/1.5.1/ideal-image-slider.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ideal-image-slider/1.5.1/themes/default/default.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <style type="text/css">
        .navbar-default{
            margin-bottom: 0 !important;
        }

        .background-image{
            background-image: url("/img/pexels-photo-168066.jpeg") !important;
            background-size: cover;
            background-position: bottom center;
            background-repeat: no-repeat;
        }

        .gradient{
            position: absolute;
            top:0;
            left: 0;
            box-shadow: #1a1a1a 0 400px 10px 10px inset;
            height: 400px;
            width: 100%;
            z-index: 999;
        }
    </style>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ideal-image-slider/1.5.1/ideal-image-slider.min.js"></script>
    @include('template.geolocation', ['precision'=>5])
    @include('template.update_varieties')
    <script type="text/javascript">
        var slider = new IdealImageSlider.Slider({
            selector: '#slider',
            interval: 4000,
            height: 500,
            effect:'fade',
            disableNav:true
        });
        slider.start();
    </script>
@stop
