<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsVanTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('van_types', function (Blueprint $table) {
            $table->integer('cost')->nullable()->after('type');
            $table->integer('mileage')->nullable();
            $table->integer('mileage_allowance')->nullable();
            $table->text('day_rules')->nullable();
            $table->integer('discount')->nullable();
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
