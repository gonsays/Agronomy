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
                    <a href="#" class="list-group-item">Products List</a>
                    <a href="#" class="list-group-item">View Stats</a>
                    <a href="#" class="list-group-item">Check Users</a>
                    <a href="#" class="list-group-item">Orders</a>

                </div>
            </div>
            <div class="col-md-10">
                @include('product.templates.form')
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        var list = $('#list_varieties');
        var inputBox = $('#add_varieties');
        var varieties = $('#varieties');
        $('#btn_add_varieties').click(function (e) {
            e.preventDefault();
            var value = inputBox.val();
            if(value.trim() == "")
                    return false;


            var li = document.createElement('li');
            li.className = "list-group-item";
            li.innerText = value;
            list.append(li);

            varieties.val(varieties.val()+value+",");

            inputBox.val("");
        })
    </script>
@stop