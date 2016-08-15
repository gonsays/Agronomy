{{ Form::open(['action'=>'ProductController@store','files' => true]) }}
<h2>Add a Product</h2>
<hr>

{{--Name--}}
<div class="form-group {{ $errors->has('name') ?'has-errors':'' }}">
    <label for="name">Name</label>

    <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}" placeholder="Enter Product Name">

    @if($errors->has('name'))
        <span class="help-block danger">
            <strong>{{$errors->first('name')}}</strong>
        </span>
    @endif
</div>

{{--Crop Type--}}
<div class="form-group {{ $errors->has('type') ?'has-errors':'' }}">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="Vegetable">Vegetable</option>
        <option value="Fruit">Fruit</option>
        <option value="Spice">Spice</option>
        <option value="Grain">Grain</option>
        <option value="Drink">Drink</option>
    </select>

    @if($errors->has('type'))
        <span class="help-block danger">
                                <strong>{{$errors->first('type')}}</strong>
                            </span>
    @endif
</div>

{{--Crop Image--}}
<div class="form-group {{ $errors->has('image') ?'has-errors':'' }}">
    <label for="type">Image</label>

    <input type="file" accept=".jpg,.png" name="image">


    @if($errors->has('image'))
        <span class="help-block danger">
            <strong>{{$errors->first('image')}}</strong>
        </span>
    @endif
</div>


<fieldset>
    {{--Varieties--}}
    <div class="form-group {{ $errors->has('image') ?'has-errors':'' }}">
        <label for="add_varieties">Varieties</label>
        <input type="hidden" name="varieties" id="varieties">
        <input type="text"  id="add_varieties" class="form-control" placeholder="Add Varieties">

        <button class="btn btn-md btn-primary" id="btn_add_varieties">Add</button>

        <ul class="list-group" id="list_varieties">

        </ul>


        @if($errors->has('varieties'))
            <span class="help-block danger">
                    <strong>{{$errors->first('varieties')}}</strong>
            </span>
        @endif
    </div>
</fieldset>

<input type="submit" value="Submit" class="btn btn-success btn-lg">

{{ Form::close() }}