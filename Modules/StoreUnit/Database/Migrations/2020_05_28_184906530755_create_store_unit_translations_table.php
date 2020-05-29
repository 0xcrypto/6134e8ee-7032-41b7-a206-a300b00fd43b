<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreUnitTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_unit_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_unit_id')->unsigned();

            $table->string('locale');

            $table->unique(['store_unit_id', 'locale']);
            $table->foreign('store_unit_id')->references('id')->on('store_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_unit_translations');
    }
}
