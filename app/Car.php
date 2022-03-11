<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['make','model','engine_size','registration','price','image','enabled'];

    //
    public function tags(){
        return $this->belongstoMany(CarTag::class);
    }
}
