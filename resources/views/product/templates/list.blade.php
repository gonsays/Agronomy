{{ $varieties->links() }}

@foreach($varieties as $variety)
    <div class="admin-varieties-list">
        <div class="row admin-variety-item">
            <div class="small-3 columns">
                <a href="#">
                    <img src="{{ Storage::url($variety->image) }}" alt="">
                    {{--{{ Html::image(Storage::url($variety->image),"",[],true) }}--}}
                </a>
            </div>
            <div class="small-9 columns admin-varieties-details">

                <div class="row">
                    <div class="small-9 columns">
                        <h3>{{ $variety->name }}</h3>
                        <p>{{ $variety->product->name }} / {{ $variety->product->type->name }}</p>
                        <p>Date Added: {{ $variety->created_at }}</p>
                        <p>Date Updated: {{ $variety->updated_at }}</p>
                    </div>
                    <div class="small-3 columns">
                        <a class="btn btn-lg btn-success btn-variety-edit" href="{{ action("AdminPanelController@editProduct", $variety->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

