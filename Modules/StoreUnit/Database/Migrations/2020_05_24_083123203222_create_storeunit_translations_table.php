<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatestoreunitTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeunit_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storeunit_id');

            $table->string('locale');

            $table->unique(['storeunit_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storeunit_translations');
    }
}
