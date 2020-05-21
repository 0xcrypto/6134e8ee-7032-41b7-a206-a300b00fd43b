<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageRecipientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_recipient_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_recipient_id');

            $table->string('locale');

            $table->unique(['message_recipient_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_recipient_translations');
    }
}
