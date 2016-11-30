<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');

            $table->string('type');

            $table->boolean('sunday');
            $table->string('sunday_start');
            $table->string('sunday_stop');
            $table->string('sunday_lead_time');

            $table->boolean('monday');
            $table->string('monday_start');
            $table->string('monday_stop');
            $table->string('monday_lead_time');

            $table->boolean('tuesday');
            $table->string('tuesday_start');
            $table->string('tuesday_stop');
            $table->string('tuesday_lead_time');

            $table->boolean('wednesday');
            $table->string('wednesday_start');
            $table->string('wednesday_stop');
            $table->string('wednesday_lead_time');

            $table->boolean('thursday');
            $table->string('thursday_start');
            $table->string('thursday_stop');
            $table->string('thursday_lead_time');

            $table->boolean('friday');
            $table->string('friday_start');
            $table->string('friday_stop');
            $table->string('friday_lead_time');

            $table->boolean('saturday');
            $table->string('saturday_start');
            $table->string('saturday_stop');
            $table->string('saturday_lead_time');

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
        Schema::drop('schedules');
    }
}
