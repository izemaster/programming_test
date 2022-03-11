<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarTag extends Model
{
    public function cars(){
        return $this->belongstoMany(Car::class);
    }

}
