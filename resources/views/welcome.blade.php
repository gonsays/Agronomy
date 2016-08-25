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
                                <option value="">Andhra Pradesh</option>
                                <option value="">Arunachal Pradesh</option>
                                <option value="">Assam</option>
                                <option value="">Bihar</option>
                                <option value="">Chhattisgarh</option>
                                <option value="">Goa</option>
                                <option value="">Gujarat</option>
                                <option value="">Haryana</option>
                                <option value="">Himachal Pradesh</option>
                                <option value="">Jammu & Kashmir</option>
                                <option value="">Jharkhand</option>
                                <option value="">Karnataka</option>
                                <option value="">Kerala</option>
                                <option value="">Madhya Pradesh</option>
                                <option value="">Maharashtra</option>
                                <option value="">Manipur</option>
                                <option value="">Meghalaya</option>
                                <option value="">Mizoram</option>
                                <option value="">Nagaland</option>
                                <option value="">Odisha</option>
                                <option value="">Punjab</option>
                                <option value="">Rajasthan</option>
                                <option value="">Sikkim</option>
                                <option value="">Tamil Nadu</option>
                                <option value="">Telangana</option>
                                <option value="">Tripura</option>
                                <option value="">Uttar Pradesh</option>
                                <option value="">Uttarakhand</option>
                                <option value="">West Bengal</option>
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
