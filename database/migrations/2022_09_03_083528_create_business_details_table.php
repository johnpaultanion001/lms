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
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('business_industry')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_province_code')->nullable();
            $table->string('business_city_municipality_code')->nullable();
            $table->string('business_permit')->nullable();
            $table->string('business_phone_number')->nullable();
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
        Schema::dropIfExists('business_details');
    }
};
