<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookingNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_new', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->enum('type', ['personal', 'company']);
            $table->string('company_postcode')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_latitude')->nullable();
            $table->string('company_longitude')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_country')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('time')->nullable();
            $table->integer('van_type_id')->nullable();
            $table->integer('van_type_setting_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('how_you_know')->nullable();
            $table->text('inventory')->nullable();
            $table->text('special_remark')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('promo_code')->nullable();
            $table->tinyInteger('congestion_change_zone')->default(0)->nullable();
            $table->tinyInteger('need_insurance')->default(0)->nullable();
            $table->string('insurance_type')->nullable();
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
