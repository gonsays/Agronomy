{{--Nav Bar--}}
<div class="nav navbar-default nav-agronomy">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <a class="logo" href="{{ action('HomeController@index') }}"></a>
                <div class="menu float-right">
                    @if(Auth::check())
                        <span>{{Auth::user()->getAttribute('name') }}</span>

                        @if(Auth::user()->isAdmin())
                            <a href="{{ action('AdminPanelController@home') }}" class="btn btn-default">Admin Panel</a>
                        @endif

                        <a href="{{ action('Auth\AuthController@logout') }}" class="btn btn-default">Logout</a>
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