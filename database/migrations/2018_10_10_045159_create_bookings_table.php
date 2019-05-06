<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->nullable();
            $table->integer('booking_id')->unique();
            $table->string('pnr')->nullable();
            $table->string('customer');
            $table->string('c_email');
            $table->string('route');
            $table->text('ticket');
            $table->integer('dep_date');
            $table->integer('return_date')->nullable();
            $table->string('booking_date');
            $table->string('status');
            $table->integer('pay_opt');
            $table->integer('class');
            $table->integer('return_class')->nullable();
            $table->string('currency');
            $table->text('pax');
            $table->float('total');
            $table->float('grand_amount');
            $table->string('coupon_code')->nullable();
            $table->float('discount_off')->nullable();
            $table->text('number')->nullable();
            $table->text('passenger_titles');
            $table->text('passenger_names');
            $table->text('passenger_mobiles');
            $table->text('passenger_passports');
            $table->text('passenger_passport_exps');
            $table->text('passenger_nationality');
            $table->text('passenger_emails');
            $table->text('passenger_dobs');
            $table->text('option')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
