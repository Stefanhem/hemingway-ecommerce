<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('product_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLabel');
            $table->unsignedBigInteger('idProduct');
            $table->foreign('idLabel')->references('id')->on('labels');
            $table->foreign('idProduct')->references('id')->on('products');
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
        Schema::dropIfExists('product_labels');
        Schema::dropIfExists('labels');
    }
}
