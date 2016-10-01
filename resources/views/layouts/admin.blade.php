@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{ action('AdminPanelController@home') }}" class="list-group-item"> Add a Product </a>
                    <a href="{{ action('AdminPanelController@productlist') }}" class="list-group-item">Products List</a>
                    <a href="#" class="list-group-item">Preferences</a>
                    <a href="{{ action('AdminPanelController@reports') }}" class="list-group-item">Reports</a>
                    <a href="{{ action('AdminPanelController@transactionReports') }}" class="list-group-item">Transaction Reports</a>

                </div>
            </div>
            <div class="col-md-8">
                @yield('body')
            </div>
        </div>
    </div>

@stop