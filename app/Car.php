<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['make','model','engine_size','registration','price','image','enabled'];

    //
    public function car_tags(){
        return $this->belongstoMany(CarTag::class)->withTimestamps();
    }

    public function toArray(){
        return [
            'make' => $this->make,
            'model' => $this->model,
            'engine_size' => $this->engine_size,
            'enabled' => $this->enabled
        ];
    }

    public function baskets(){
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
