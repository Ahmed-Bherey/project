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
        Schema::create('hotel_contract_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('reservationDate_id')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->integer('room_type_id')->nullable();
            $table->integer('mealPlan_id')->nullable();
            $table->integer('roomCategory_id')->nullable();
            $table->string('rate')->nullable();
            $table->string('name')->nullable();
            $table->longText('note')->nullable();

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
        Schema::dropIfExists('hotel_contract_reservations');
    }
};
