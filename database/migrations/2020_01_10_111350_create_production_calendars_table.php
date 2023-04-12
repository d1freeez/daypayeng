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
        Schema::create('production_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month_number');
            $table->integer('month_dates');
            $table->integer('five_working_days');
            $table->integer('six_working_days');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_calendars');
    }
};
