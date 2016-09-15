@foreach($products as $product)
    <div class="product-container">
        <div class="row">
            <div class="small-3 columns">
                <a href="#">
                    <img src="#" alt="">
                </a>
            </div>
            <div class="small-9 columns">

                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->type }}</p>
                    <p>{{ $product->created_at }}</p>
                    <p>{{ $product->updated_at }}</p>
                    <a href="{{ action("AdminPanelController@editProduct", $product->id) }}">Edit</a>

            </div>
        </div>
    </div>
@endforeach