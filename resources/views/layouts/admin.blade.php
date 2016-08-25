@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{ action('AdminPanelController@home') }}" class="list-group-item">
                        Add a Product
                    </a>
                    <a href="{{ action('AdminPanelController@productlist') }}" class="list-group-item">Products List</a>
                    <a href="#" class="list-group-item">View Stats</a>
                    <a href="#" class="list-group-item">Check Users</a>
                    <a href="#" class="list-group-item">Orders</a>

                </div>
            </div>
            <div class="col-md-8">
                @yield('body')
            </div>
        </div>
    </div>

@stop