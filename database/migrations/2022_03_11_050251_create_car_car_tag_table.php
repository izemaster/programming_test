<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCarTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_car_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('car_tag_id')->unsigned();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('car_tag_id')->references('id')->on('car_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_car_tag');
    }
}
