<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id');
            $table->string('locale');
            $table->unique(['message_id', 'locale']);
            
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_translations');
    }
}
