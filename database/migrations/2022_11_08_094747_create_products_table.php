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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tags');
            $table->string('shopname');
            $table->double('price');
            $table->string('image_front')->nullable();
            $table->string('image_back')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE products ADD 
        (front_shirt MEDIUMBLOB, back_shirt MEDIUMBLOB)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
