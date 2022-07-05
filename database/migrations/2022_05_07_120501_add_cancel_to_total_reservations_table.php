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
            $table->string('cancel')->nullable()->after('to');
            $table->string('rooms')->nullable()->after('cancel');
            $table->string('dateReservation')->nullable()->after('cancel');
            $table->string('extraCharge')->nullable()->after('cancel');

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
            $table->dropColumn(['cancel']);
            $table->dropColumn(['rooms']);
            $table->dropColumn(['dateReservation']);
            $table->dropColumn(['extraCharge']);

        });
    }
};
