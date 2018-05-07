<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MercadolibreQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mercadolibre_questions');
        //Notifications
        Schema::create('mercadolibre_questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('subject');
            $table->longText('message');
            $table->string('priority');
            $table->smallInteger('status');
            $table->smallInteger('process');
            $table->string('zendesk');
            $table->string('mercadolibre_question_id');
            $table->dateTime('received')->comment('Received Quetion Day');
            $table->dateTime('sent')->nullable()->comment('Sent Respont Day');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercadolibre_questions', function (Blueprint $table) {
            //
        });
    }
}
