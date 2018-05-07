<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MercadolibreNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mercadolibre_notifications');
        Schema::dropIfExists('mercadolibre_queue');
        //Notifications
        Schema::create('mercadolibre_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resource');
            $table->string('user_id');
            $table->string('topic');
            $table->string('application_id');
            $table->smallInteger('attempts');
            $table->smallInteger('status');
            $table->smallInteger('process');
            $table->longText('message');
            $table->dateTime('sent');
            $table->dateTime('received');
            $table->longText('request');
            $table->longText('response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercadolibre_notifications', function (Blueprint $table) {
            //
        });
    }
}
