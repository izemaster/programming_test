@extends ('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection
@section('content')
<h2>Add new car</h2>
<form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="form-container">

        <div class="input-group">
            <label for="make">Make: </label><input id="make" name="make" type="text" >
        </div>
        <div class="input-group">
            <label for="model">Model: </label><input id="model" name="model" type="text" >
        </div>
        <div class="input-group">
            <label for="engine_size">Engine Size: </label><input id="engine_size" name="engine_size" type="text" >
        </div>
        <div class="input-group">
            <label for="registration">Registration: </label><input id="registration" name="registration" type="text" >
        </div>
        <div class="input-group">
            <label for="price">Price: </label><input id="price" name="price" type="text" >
        </div>
        <div class="input-group">
            <label for="photo">Upload photo: </label>
            <input type="file" name="photo">
        </div>
        <div class="input-group">
            <button type="submit">Create</button>
        </div>


        <h3>Color</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Color') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="tags[{{$tag->id}}]"  name="tags[{{$tag->id}}]" value="{{$tag->id}}">{{$tag->value}}</label>
            @endforeach
        </div>

        <h3>Doors</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Doors') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="chktags[{{$tag->id}}]" name="tags[{{$tag->id}}]" value="{{$tag->id}}">{{$tag->value}}</label>
            @endforeach
        </div>

        <h3>Transmission</h3>
        <div class="checkbox-group">
            @foreach($tags->where('category','Transmission') as $tag)
            <label for="tags[{{$tag->id}}]"><input type="checkbox" id="tags[{{$tag->id}}]" name="tags[{{$tag->id}}]" value="{{$tag->id}}">{{$tag->value}}</label>
            @endforeach
        </div>

    </div>
</form>
@endsection
