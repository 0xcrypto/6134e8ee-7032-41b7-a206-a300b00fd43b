<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("store");
            $table->string("product")->nullable();
            $table->string("quantity")->nullable();
            $table->string("availability");
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
        //Schema::dropIfExists('storeunits');
    }
}