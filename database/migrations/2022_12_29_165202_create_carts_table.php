<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('email');
            $table->string('shopname');
            $table->string('title');
            $table->integer('quantity');
            $table->double('price');
            $table->double('subtotal');
            $table->integer('weight');
            $table->string('size');
            $table->string('color');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
