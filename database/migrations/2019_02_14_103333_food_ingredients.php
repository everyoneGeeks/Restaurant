<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FoodIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('food_ingredients', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('food_id')->unsigned();
                $table->integer('kitchen_id')->unsigned();
                $table->integer('amount');
                $table->timestamps();
            });

            Schema::table('food_ingredients', function (Blueprint $table) {
                $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
                $table->foreign('kitchen_id')->references('id')->on('Kitchen')->onDelete('cascade');
            });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_ingredients');
    }
}
