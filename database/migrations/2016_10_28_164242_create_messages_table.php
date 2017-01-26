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

        DB::table('template_types')->insert(
            array(
                array(
                    'name' => 'Voice',
                    'description' => 'Voice template.',
                ),
                array(
                    'name' => 'SMS',
                    'description' => 'Sms template.',
                ),
                array(
                    'name' => 'Email',
                    'description' => 'Email template.',
                )
            )
        );

        Schema::create('template_sub_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('template_types');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('template_sub_types')->insert(
            array(
                array(
                    'parent_id' => 1,
                    'name' => 'Outbound Human Script',
                    'description' => 'Human voice script'
                ),
                array(
                    'parent_id' => 1,
                    'name' => 'Outbound Machine Script',
                    'description' => 'Machine voice script'
                ),
                array(
                    'parent_id' => 2,
                    'name' => 'Outbound SMS Script',
                    'description' => 'SMS template'
                ),
                array(
                    'parent_id' => 3,
                    'name' => 'Outbound Email template',
                    'description' => 'Email template'
                ),
                array(
                    'parent_id' => 3,
                    'name' => 'System Email template',
                    'description' => 'Email template'
                )
            )
        );

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

        DB::table('templates')->insert(
            array(
                array(
                    'team_id' => 1,
                    'template_type_id' => 1,        // Voice
                    'template_sub_type_id' => 1,    // Human
                    'message_type_id' => 2,         // Appointment
                    'title' => 'Human Appointment Voice Script',
                    'description' => 'Default appointment voice script for human pickups',
                    'default' => true,
                    'public' => true
                ),
                array(
                    'team_id' => 1,
                    'template_type_id' => 1,        // Voice
                    'template_sub_type_id' => 2,    // Machine
                    'message_type_id' => 2,         // Appointment
                    'title' => 'Machine Appointment Voice Script',
                    'description' => 'Default appointment voice script for machine pickups',
                    'default' => true,
                    'public' => true
                ),
                array(
                    'team_id' => 1,
                    'template_type_id' => 2,        // SMS
                    'template_sub_type_id' => 3,    // Outbound
                    'message_type_id' => 2,         // Appointment
                    'title' => ' Appointment SMS template',
                    'description' => 'Default appointment sms template',
                    'default' => true,
                    'public' => true
                ),
                array(
                    'team_id' => 1,
                    'template_type_id' => 3,        // Email
                    'template_sub_type_id' => 4,    // Outbound
                    'message_type_id' => 2,         // Appointment
                    'title' => ' Appointment Email template',
                    'description' => 'Default appointment email template',
                    'default' => true,
                    'public' => true
                )
            )
        );

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

//        Schema::create('voice_templates', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('template_id')->unsigned();
//            $table->foreign('template_id')->references('id')->on('template_id');
//            $table->string('transcript')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('voice_template_part_types', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('description');
//            $table->timestamps();
//        });
//
//        DB::table('voice_template_part_types')->insert(
//            array(
//                array(
//                    'name' => 'Audio',
//                    'description' => 'Play an audio file.',
//                ),
//                array(
//                    'name' => 'TTS',
//                    'description' => 'Play TTS of text input.',
//                )
//            )
//        );
//
//        Schema::create('voice_template_parts', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('voice_template_id')->unsigned();
//            $table->foreign('voice_template_id')->references('id')->on('voice_templates');
//            $table->integer('voice_template_part_type_id')->unsigned();
//            $table->foreign('voice_template_part_type_id')->references('id')->on('voice_template_part_types');
//            $table->integer('sequence');    // {n}-[yes/no] or [1,2,3]
//            $table->integer('repeat')->nullable();
//            $table->timestamps();
//        });

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
