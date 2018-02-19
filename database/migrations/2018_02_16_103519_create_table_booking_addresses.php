<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookingAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['pickup', 'dropoff']);
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('floor')->nullable();
            $table->string('parking')->nullable();
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
        //
    }
}
