<?php

use App\CarTag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarTag::create([
            "category" => "Color",
            "value" => "red",
        ]);

        CarTag::create([
            "category" => "Color",
            "value" => "blue",
        ]);

        CarTag::create([
            "category" => "Color",
            "value" => "gray",
        ]);
    }
}
