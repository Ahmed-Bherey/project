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
        Schema::create('guest_reservation_adults', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_reservation_id');
            $table->string('nid')->nullable();
            $table->string('name')->nullable();

            $table->string('birth_date')->nullable();
            $table->string('nationality')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('whatsapp')->nullable()->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('guest_reservation_adults');
    }
};
