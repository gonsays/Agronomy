@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        Add a Product
                    </a>
                    <a href="#" class="list-group-item">View Stats</a>
                    <a href="#" class="list-group-item">Check Users</a>
                    <a href="#" class="list-group-item">Orders</a>

                </div>
            </div>
            <div class="col-md-10">
                {{ Form::open(['action'=>'ProductController@store']) }}
                    <h2>Add a Product</h2>
                    <hr>

                    {{--Name--}}
                    <div class="form-group {{ $errors->has('name') ?'has-errors':'' }}">
                        <label for="name">Name</label>

                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}" placeholder="Enter Product Name">

                        @if($errors->has('name'))
                            <span class="help-block danger">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>

                    {{--Crop Type--}}
                    <div class="form-group {{ $errors->has('type') ?'has-errors':'' }}">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="Vegetable">Vegetable</option>
                            <option value="Fruit">Fruit</option>
                            <option value="Spice">Spice</option>
                            <option value="Grain">Grain</option>
                            <option value="Drink">Drink</option>
                        </select>

                        @if($errors->has('type'))
                            <span class="help-block danger">
                                <strong>{{$errors->first('type')}}</strong>
                            </span>
                        @endif
                    </div>

                    {{--Crop Image--}}
                    <div class="form-group {{ $errors->has('image') ?'has-errors':'' }}">
                        <label for="type">Image</label>

                        <input type="file" accept=".jpg,.png">


                        @if($errors->has('image'))
                            <span class="help-block danger">
                                <strong>{{$errors->first('image')}}</strong>
                            </span>
                        @endif
                    </div>


                    <fieldset>
                        {{--Varieties--}}
                        <div class="form-group {{ $errors->has('image') ?'has-errors':'' }}">
                            <label for="varieties">Varieties</label>
                            <input type="text"  id="add_varieties" class="form-control" placeholder="Add Varieties">

                            <button class="btn btn-md btn-primary" name="varieties" id="btn_add_varieties">Add</button>

                            <ul class="list-group" id="list_varieties">

                            </ul>


                            @if($errors->has('varieties'))
                                <span class="help-block danger">
                                    <strong>{{$errors->first('varieties')}}</strong>
                            </span>
                            @endif
                        </div>
                    </fieldset>

                    <input type="submit" value="Submit" class="btn btn-success btn-lg">

                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        var list = $('#list_varieties');
        var inputBox = $('#add_varieties');
        $('#btn_add_varieties').click(function (e) {
            e.preventDefault();
            var value = inputBox.val();
            if(String.trim(value)== "")
                    return false;


            var li = document.createElement('li');
            li.className = "list-group-item";
            li.innerText = value;
            list.append(li);

            inputBox.attr('data-values',inputBox.val()+','+value);

            inputBox.val("");
        })
    </script>
@stop