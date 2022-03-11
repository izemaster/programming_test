@extends('layouts.admin')
@section('styles')
<style>
table, th ,td {
    border: 1px solid black;
}
.table-cars{
    border-collapse: collapse;
    display: block;
    margin: 20px auto;
}
.table-cars thead{
    background: lightgray;
    color: white;
    font-weight: bold;
}
</style>
@endsection
@section('content')
<form action="{{route('cars.create')}}">
    <button type="submit">New Car</button>
</form>
<table class="table-cars">
    <thead>
        <tr>
            <td>Id</td>
            <td>Make</td>
            <td>Model</td>
            <td>Registration</td>
            <td>Engine Size</td>
            <td>Price</td>
            <td>Active</td>
            <td colspan="2">&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)


        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->make}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->registration}}</td>
            <td>{{$car->engine_size}}</td>
            <td>{{$car->price}}</td>
            <td>{{$car->enabled ? 'YES':'NO'}}</td>
            <td>
                <form action="{{route("cars.edit",$car)}}">
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{route("cars.toggle",$car)}}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit">{{!$car->enabled ? 'Enable':'Disable'}}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
