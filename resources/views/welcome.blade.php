@extends('layouts.app')

@section('content')
    <div class="wrapper">

        {{--Nav Bar--}}
        <div class="nav navbar-default">
            <div class="row">
                <div class="small-12 columns">
                    <div>
                        <div class="logo"></div>
                        <div class="menu float-right">
                            <a href="" class="btn btn-success">Register</a>
                            <a href="" class="btn btn-default">Login</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-shadow"></div>
        </div>

        {{--Cover--}}
        <div class="cover">
            <div class="row">
                <div class="columns small-12">
                    <div class="cloud"></div>
                </div>
            </div>
        </div>
    </div>

    {{--Search--}}
    <div class="container_search">
        <div class="row">
            <div class="small-6 columns small-centered">
                <div class="form-container">
                    <h1>Find your Product Instantly!</h1>
                    <form action="">
                        <input type="text" placeholder="Search an item" class="form-control">
                        <input type="submit" value="Search" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
