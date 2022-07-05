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
        Schema::create('new_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('whatsapp')->nullable();
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
        Schema::dropIfExists('new_agents');
    }
};
