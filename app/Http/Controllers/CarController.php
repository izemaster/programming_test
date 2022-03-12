<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\CarTag;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $this->authorize('admin-options');
        $cars = Car::all();
        return view('cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin-options');
        $tags = CarTag::all();
        return view('cars.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-options');
        //dd($request);
        $validatedData = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'engine_size' => 'required|numeric',
            'registration' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image'
        ]);

        $tag_ids = $request->tags;
        $car = Car::create($request->all());
        $car->car_tags()->sync($tag_ids);
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('images','public');

            $car->update([
                'image' => $path
            ]);
        }

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $this->authorize('admin-options');
        $tags = CarTag::all();
        return view('cars.edit',compact('car','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'engine_size' => 'required|numeric',
            'registration' => 'required',
            'price' => 'required|numeric',
            'photo' => 'sometimes|image'
        ]);

        $car->update($request->all());
        if($request->hasFile('photo')){
            Storage::delete(storage_path($car->image));
            $path = $request->file('photo')->store('images','public');

            $car->update([
                'image' => $path
            ]);
        }

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggle(Car $car){
        $car->update([
            'enabled' => !$car->enabled
        ]);
        return redirect()->route('cars.index');
    }
}
