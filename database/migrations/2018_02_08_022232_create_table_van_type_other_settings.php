<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVanTypeOtherSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_type_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('van_type_id');
            $table->integer('man')->default(0);
            $table->integer('title')->nullable();
            $table->integer('sunday')->default(0);
            $table->integer('monday')->default(0);
            $table->integer('tuesday')->default(0);
            $table->integer('wednesday')->default(0);
            $table->integer('thursday')->default(0);
            $table->integer('friday')->default(0);
            $table->integer('saturday')->default(0);
            $table->integer('holiday')->default(0);
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
