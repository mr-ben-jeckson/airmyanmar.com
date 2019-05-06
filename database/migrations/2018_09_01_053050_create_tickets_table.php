<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->string('to');
            $table->string('flight');
            $table->string('flight_no');
            $table->boolean('route_type');
            $table->string('via')->nullable();
            $table->text('adates');
            $table->string('dep');
            $table->string('eta');
            $table->string('duration');
            $table->string('tm_cat');
            $table->string('words')->nullable();
            $table->text('policy');
            $table->float('saver_fare_usd');
            $table->float('saver_fare_child_usd');
            $table->float('saver_fare_infant_usd');
            $table->float('saver_fare_mm');
            $table->float('saver_fare_child_mm');
            $table->float('saver_fare_infant_mm');
            $table->float('plus_fare_usd');
            $table->float('plus_fare_child_usd');
            $table->float('plus_fare_infant_usd');
            $table->float('plus_fare_mm');
            $table->float('plus_fare_child_mm');
            $table->float('plus_fare_infant_mm');
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
        Schema::dropIfExists('tickets');
    }
}
