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
        Schema::create('total_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->string('total')->nullable();
            $table->longText('note')->nullable();
            $table->longText('specialRequest')->nullable();
            $table->string('nights_no')->nullable();
            $table->string('totalHotel')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('from')->nullable();
            $table->longText('to')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->string('roomNumber')->nullable();
            $table->unsignedBigInteger('roomType_id')->nullable();
            $table->unsignedBigInteger('roomCategory_id')->nullable();
            $table->unsignedBigInteger('travel_agent_id')->nullable();
            $table->unsignedBigInteger('meal_id')->nullable();
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
        Schema::dropIfExists('total_reservations');
    }
};
