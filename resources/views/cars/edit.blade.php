@extends ('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection
@section('content')
<h2>Edit Car</h2>
<form action="{{route('cars.update',$car)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-container">

        <div class="input-group">
            <label for="make">Make: </label><input id="make" name="make" type="text" value="{{old('make',$car->make)}}">
        </div>
        <div class="input-group">
            <label for="model">Model: </label><input id="model" name="model" type="text" value="{{old('model',$car->model)}}">
        </div>
        <div class="input-group">
            <label for="engine_size">Engine Size: </label><input id="engine_size" name="engine_size" type="text" value="{{old('engine_size',$car->engine_size)}}">
        </div>
        <div class="input-group">
            <label for="registration">Registration: </label><input id="registration" name="registration" type="text" value="{{old('registration',$car->registration)}}">
        </div>
        <div class="input-group">
            <label for="price">Price: </label><input id="price" name="price" type="text"  value="{{old('price',$car->price)}}">
        </div>
        <div class="input-group">
            <label for="current_photo">Current photo: </label>
            <img src="{{asset('storage/'.$car->image)}}" alt="">
        </div>
        <div class="input-group">
            <label for="photo">Update photo: </label>
            <input type="file" name="photo">
        </div>
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="input-group">
            <button type="submit">Update</button>
        </div>
        <h3>Color</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Color') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="tags[{{$tag->id}}]"  name="tags[{{$tag->id}}]" value="{{$tag->id}}" {{$car->car_tags->contains('id',$tag->id) ? 'checked' : ''}}>{{$tag->value}}</label>
            @endforeach
        </div>

        <h3>Doors</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Doors') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="chktags[{{$tag->id}}]" name="tags[{{$tag->id}}]" value="{{$tag->id}}" {{$car->car_tags->contains('id',$tag->id) ? 'checked' : ''}}>{{$tag->value}}</label>
            @endforeach
        </div>

        <h3>Transmission</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Transmission') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="tags[{{$tag->id}}]" name="tags[{{$tag->id}}]" value="{{$tag->id}}" {{$car->car_tags->contains('id',$tag->id) ? 'checked' : ''}}>{{$tag->value}}</label>
            @endforeach
        </div>


    </div>
</form>
@endsection
