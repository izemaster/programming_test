<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['user_id','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cars(){
        return $this->belongsToMany(Car::class)->withPivot('quantity');
    }
}
