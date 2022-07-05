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
        Schema::table('hotel_contracts', function (Blueprint $table) {
            $table->string('offerFrom')->nullable()->after('note');
            $table->string('offerTo')->nullable()->after('offerFrom');

            $table->string('offerRate')->nullable()->after('offerTo');
            $table->string('reservationRate_id')->nullable()->after('offerRate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_contracts', function (Blueprint $table) {
            $table->dropColumn(['offerRate']);
            $table->dropColumn(['offerFrom']);
            $table->dropColumn(['offerTo']);
            $table->dropColumn(['reservationRate_id']);

        });
    }
};
