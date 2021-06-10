<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->float('protein');
            $table->float('fats');
            $table->float('carbs');
            $table->integer('mass');
            $table->string('image');
            $table->tinyInteger('discount');
            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('factoryID');
            $table->foreign('factoryID')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
