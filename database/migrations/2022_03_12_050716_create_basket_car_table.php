<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_car', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basket_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('quantity');
            $table->timestamps();

            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_cars');
    }
}
