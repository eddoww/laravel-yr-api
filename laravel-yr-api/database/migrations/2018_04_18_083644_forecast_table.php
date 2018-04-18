<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForecastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    // should prolly be proper ints/bigints/datetimes etc. for the database, but for this small app I don't think it'll matter.

        Schema::create('forecasts', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('country');
	        $table->string('city');
            $table->string('from');
            $table->string('to');
            $table->string('temp');
            $table->string('windDir');
            $table->string('windSpeed');
            $table->string('pressure');
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
        Schema::drop('forecasts');
    }
}
