<div class="row">
    <div class="small-12 columns">
        <ul class="nav nav-pills nav-justified">
            <li class="{{ $active==1?'active':'' }}"><a href="{{ action('AuctionController@myAccount') }}">My Account</a></li>
            <li class="{{ $active==2?'active':'' }}"><a href="{{ action('AuctionController@myAuctions') }}">My Auctions</a></li>
            <li class="{{ $active==3?'active':'' }}"><a href="{{ action('AuctionController@myBids') }}">My Bids</a></li>
        </ul>
    </div>
</div>