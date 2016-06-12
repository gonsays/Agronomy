@extends('layouts.base')
@section('title','Register')
@section('head')
    <style>
        body{
            background-color: orangered;
        }
    </style>    
@stop
@section('body')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="signup-container shadow">

                <h1>Register</h1>

                {!! Form::open(array('route' => 'user.store')) !!}

                {{--username--}}
                <div class="form-group">
                    <label for="txt_username">Username</label>
                    <input class="form-control" type="text" placeholder="Pick Username" id="txt_username" name="username" value="{{ old('username') }}">
                </div>

                {{--email--}}
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <input class="form-control" type="email" placeholder="Pick Email" id="txt_email" name="email" value="{{ old('email') }}">
                </div>


                {{--password--}}
                <div class="form-group">
                    <label for="txt_password">Password</label>
                    <input class="form-control" type="password" placeholder="Enter Password" id="txt_password" name="password">
                </div>

                {{--confirm password--}}
                <div class="form-group">
                    <label for="txt_confirm_password">Confirm Password</label>
                    <input class="form-control" type="password" placeholder="Confirm Password" id="txt_confirm_password" name="confirm_password">
                </div>

                {{--phone--}}
                <div class="form-group">
                    <label for="txt_phone">Phone</label>
                    <input type="tel" name="phone" id="txt_phone" class="form-control" placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                    <input type="submit" value="Sign Up" class="btn btn-lg btn-success">
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop