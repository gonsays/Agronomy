@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@stop

@section('body')
        @include('product.templates.create')
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