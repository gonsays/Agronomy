{{--Nav Bar--}}
<div class="nav navbar-default nav-agronomy">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <a class="logo" href="{{ url("/") }}"></a>
                <div class="menu float-right">

                    @if(Auth::check())
                        <a href="{{ action('HomeController@index') }}" class="btn btn-default">Home</a>
                    @endif

                    <a href="{{ action('AuctionController@index') }}" class="btn btn-default">Auctions</a>

                    @if(Auth::check())

                        @if(Auth::user()->isAdmin())
                            <a href="{{ action('AdminPanelController@home') }}" class="btn btn-default">Admin Panel</a>
                        @endif
                        <span>

                            <div class="dropdown">
                              <a class="btn btn-default" data-toggle="dropdown">
                                  {{Auth::user()->getAttribute('name') }}
                                    <span class="caret"></span>
                              </a>
                                
                              <ul class="dropdown-menu">
                                  <li><a href="{{ action('AuctionController@myAccount') }}">My Account</a></li>
                                  <li><a href="{{ action('AuctionController@myAuctions') }}">My Auctions</a></li>
                                  <li><a href="{{ action('AuctionController@myBids') }}">My Bids</a></li>
                                  <li><a href="{{ action('Auth\AuthController@logout') }}">Logout</a></li>
                              </ul>
                            </div>

                        </span>
                    @else
                        <a href="{{ action('Auth\AuthController@register') }}" class="btn btn-success">Register</a>
                        <a href="{{ action('Auth\AuthController@login') }}" class="btn btn-default">Login</a>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="nav-shadow"></div>
</div>