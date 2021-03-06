<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create(
            [
                "model" => "2500 Crew Cab",
                "make" => "GMC",
                "registration" => "0123456789",
                "price" => 20578.50,
                "engine_size" => "1.4",
                "image" => "images/tvjxamFZb7JeAezfKdXsIcSLxSFioh6ZzCutvdx3.jpg",
                "enabled" => true,


            ]);
        $car = Car::create(
            [
                "model" => "A-Class 2022",
                "make" => "Mercedes-Benz",
                "registration" => "987654321",
                "price" => 41500.00,
                "engine_size" => "1.4",
                "image" => "images/daxPcxS0stX7dhJz4GTHJMH9J3ITfi2ZNbt13YOm.webp",
                "enabled" => true,


            ]);
        $car->car_tags()->sync([1,4,7]);
    }
}
