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
        Schema::create('bank_moves', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('collect')->nullable();
            $table->string('Bank_id')->nullable();
            $table->string('pay')->nullable();
            $table->string('kind')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('bank_moves');
    }
};
