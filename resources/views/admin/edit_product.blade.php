@extends('layouts.admin')

@section('body')
    @include('product.templates.create',['product' => $product])
@stop