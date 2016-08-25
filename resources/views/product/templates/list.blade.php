@foreach($products as $product)
    <div class="product-container">
        <div class="row">
            <div class="small-3 columns">
                <a href="#">
                    <img src="#" alt="">
                </a>
            </div>
            <div class="small-9 columns">
                <a href="#">
                    <h3>{{ $product->name }}</h3>
                </a>
                    <p>{{ $product->type }}</p>
                    <p>{{ $product->created_at }}</p>
                    <p>{{ $product->updated_at }}</p>

            </div>
        </div>
    </div>
@endforeach