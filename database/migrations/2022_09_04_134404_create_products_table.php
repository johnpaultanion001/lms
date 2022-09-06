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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('image')->nullable();
            $table->string('product_id')->nullable();
            $table->string('title')->nullable();
            $table->double('price')->nullable();
            $table->string('qty')->nullable();
            $table->string('category')->nullable();
            $table->string('expiration')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('PENDING');
            
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
        Schema::dropIfExists('products');
    }
};