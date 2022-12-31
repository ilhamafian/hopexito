<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('id')->primary();
            $table->string('billplz_id');
            $table->integer('product_id');
            $table->double('price');
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE product_orders ADD 
        (product_image MEDIUMBLOB)");
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
