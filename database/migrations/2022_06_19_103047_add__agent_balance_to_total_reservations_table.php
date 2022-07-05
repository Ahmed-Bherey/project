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
        Schema::table('total_reservations', function (Blueprint $table) {
            $table->string('agentBalance')->default(0)->after('total');
            $table->string('hotelBalance')->default(0)->after('totalHotel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('total_reservations', function (Blueprint $table) {
            $table->dropColumn(['agentBalance']);
            $table->dropColumn(['hotelBalance']);


        });
    }
};
