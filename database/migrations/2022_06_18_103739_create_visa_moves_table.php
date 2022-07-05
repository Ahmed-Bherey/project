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
        Schema::create('visa_moves', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('collect')->nullable();
            $table->string('pay')->nullable();
            $table->string('kind')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('hotel_id')->nullable();
            $table->string('guest_id')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('total_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

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
        Schema::dropIfExists('visa_moves');
    }
};
