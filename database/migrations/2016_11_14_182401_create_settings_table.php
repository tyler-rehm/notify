<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');

            $table->boolean('voice')->default(0);
            $table->boolean('email')->default(0);
            $table->boolean('sms')->default(0);
            $table->boolean('sms_confirmation')->default(0);

            $table->string('timezone_offset')->nullable();

            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_city')->nullable();
            $table->string('contact_state')->nullable();
            $table->string('contact_zip')->nullable();

            $table->boolean('verified')->default(0);

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
        Schema::drop('settings');
    }
}
