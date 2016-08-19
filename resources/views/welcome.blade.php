@extends('layouts.app')

@section('content')

        {{--Cover--}}
        <div class="cover">
            <div class="row">
                <div class="columns small-12">
                    <div class="cloud"></div>
                </div>
            </div>
        </div>


    {{--Search--}}
    <div class="container_search">
        <div class="row">
            <div class="small-8 columns small-centered">
                <div class="form-container">
                    <h1>Find your Product Instantly!</h1>
                    <form action="">

                        <div class="columns small-3">
                            <select name="" id="" class="form-control">
                                <option value="">Bangalore</option>
                                <option value="">Goa</option>
                                <option value="">Pune</option>
                                <option value="">Mumbai</option>
                            </select>
                        </div>
                        <div class="columns small-7">
                            <input type="text" placeholder="Search an item" class="form-control">
                        </div>
                        <div class="columns small-2">
                            <input type="submit" value="Search" class="btn btn-success">
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
