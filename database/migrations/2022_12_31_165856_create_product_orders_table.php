<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('billplz_id')->references('id')->on('orders');
            $table->integer('product_id');
            $table->string('title');
            $table->double('price');
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
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
        Schema::dropIfExists('product_orders');
    }
};
