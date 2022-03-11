@extends ('layouts.admin')
@section('styles')
<style>
    .form-container{
        display: flex;
        flex-direction: column;
    }
    .input-group{

        margin: 5px 0;
        display: flex;
        flex-direction: row;
        justify-content: right
    }
    .checkbox-group{
        display: flex;
        flex-direction: row
    }
    .checkbox-group label{
        margin-right: 20px;
    }
    .input-group label{
        width: 100px;
        margin-right: 10px;
        text-align: right;
    }
    .input-group  button{
        font-size: 1.2em;
        color: white;
        border-radius: 8px;
        padding: 5px 15px;
        border: 1px solid darkblue;
        background: #067BF9;

    }

</style>
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
            <label for="chk1"><input type="checkbox" id="chk1" value="">red</label>
            <label for="chk1"><input type="checkbox" id="chk1" value="">blue</label>
            <label for="chk1"><input type="checkbox" id="chk1" value="">gray</label>
        </div>

        <h3>Doors</h3>
        <div class="checkbox-group">
            <label for="chk1"><input type="checkbox" id="chk1" value="">4</label>
            <label for="chk1"><input type="checkbox" id="chk1" value="">5</label>
            <label for="chk1"><input type="checkbox" id="chk1" value="">2</label>
        </div>

        <h3>Transmission</h3>
        <div class="checkbox-group">
            <label for="chk1"><input type="checkbox" id="chk1" value="">Automatic</label>
            <label for="chk1"><input type="checkbox" id="chk1" value="">Manual</label>
        </div>


    </div>
</form>
@endsection
