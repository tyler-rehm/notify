<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('message_types')->insert(
            array(
                array(
                    'name' => 'Broadcast',
                    'description' => 'Send messages on the fly.',
                ),
                array(
                    'name' => 'Appointment',
                    'description' => 'Send messages for upcoming appointments.',
                )
            )
        );

        Schema::create('template_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('template_sub_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('template_types');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->integer('template_type_id')->unsigned();
            $table->foreign('template_type_id')->references('id')->on('template_types');
            $table->integer('template_sub_type_id')->unsigned();
            $table->foreign('template_sub_type_id')->references('id')->on('template_sub_types');
            $table->integer('message_type_id')->unsigned();
            $table->foreign('message_type_id')->references('id')->on('message_types');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('default')->default(false);
            $table->boolean('public')->default(false);
            $table->boolean('archived')->default(false);
            $table->timestamps();
        });

        Schema::create('sms_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('template_id');
            $table->string('body');
            $table->string('variables')->nullable();
            $table->timestamps();
        });

        DB::table('sms_templates')->insert(
            array(
                array(
                    'template_id' => 3,
                    'body' => 'You have an appointment scheduled for {date} at {time} with {company_name}. Please reply yes to confirm or no to cancel.',
                    'variables' => 'date|time|company_name'
                )
            )
        );

        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('template_id');
            $table->string('view')->nullable();
            $table->boolean('external')->default(false);
            $table->string('external_id')->nullable();
            $table->string('external_source')->nullable();
            $table->timestamps();
        });

        DB::table('email_templates')->insert(
            array(
                array(
                    'template_id' => 3,
                    'external' => true,
                    'external_id' => '',
                    'external_source' => 'campaign_monitor'
                )
            )
        );

        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('message');
            $table->integer('message_type_id')->unsigned();
            $table->foreign('message_type_id')->references('id')->on('message_types');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('status')->nullable();
            $table->boolean('archived')->default(false);
            $table->timestamps();
        });

        Schema::create('sms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->nullable()->unsigned();
            $table->foreign('message_id')->references('id')->on('messages');
            $table->string('direction');
            $table->string('to');
            $table->string('from');
            $table->string('message');
            $table->string('status')->nullable();
            $table->string('sid')->nullable();
            $table->timestamp('queued')->nullable();
            $table->timestamp('sending')->nullable();
            $table->timestamp('sent')->nullable();
            $table->timestamp('delivered')->nullable();
            $table->timestamp('failed')->nullable();
            $table->timestamp('received')->nullable();
            $table->timestamps();
        });

        Schema::create('voices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->nullable()->unsigned();
            $table->foreign('message_id')->references('id')->on('messages');
            $table->string('direction');
            $table->string('to');
            $table->string('from');
            $table->string('status');
            $table->string('sid');
            $table->timestamps();
        });

        Schema::create('recordings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voice_id')->unsigned();
            $table->foreign('voice_id')->references('id')->on('voices');
            $table->string('file_name');
            $table->string('full_path');
            $table->timestamps();
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->nullable()->unsigned();
            $table->foreign('message_id')->references('id')->on('messages');
            $table->integer('template_id')->nullable()->unsigned();
            $table->foreign('template_id')->references('id')->on('templates');
            $table->string('status')->nullable();
            $table->string('external_id')->nullable();
            $table->string('recipient')->nullable();
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
        Schema::drop('messages');
        Schema::drop('sms');
        Schema::drop('calls');
    }
}
