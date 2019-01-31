<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('price');
            $table->integer('category_id')->unsigned();
            $table->integer('chef_id')->unsigned();
            $table->integer('is_discount')->default(0);
            $table->integer('discount')->default(0);
            $table->timestamps();
        });
        Schema::table('foods', function (Blueprint $table) {
            $table->foreign('chef_id')->references('id')->on('chefs')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
