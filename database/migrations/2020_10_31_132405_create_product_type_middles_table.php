<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypeMiddlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_middles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProductType');
            $table->unsignedBigInteger('idProduct');
            $table->timestamps();
            $table->foreign('idProduct')->references('id')->on('products');
            $table->foreign('idProductType')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_type_middles');
    }
}
