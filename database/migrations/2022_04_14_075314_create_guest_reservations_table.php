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
        Schema::create('guest_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id')->nullable();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->unsignedBigInteger('roomType_id')->nullable();
            $table->unsignedBigInteger('hotelContract_id')->nullable();
            $table->unsignedBigInteger('roomCategory_id')->nullable();

            $table->unsignedBigInteger('meal_id')->nullable();
            $table->string('hotelContractName')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->string('roomNumber')->nullable();
            $table->string('sellingRate')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->unsignedBigInteger('travel_agent_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('nights_no')->nullable();
            $table->integer('rate')->nullable();

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
        Schema::dropIfExists('guest_reservations');
    }
};
