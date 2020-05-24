<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatestoreunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeunits', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("store");
            $table->string("product");
            $table->string("quantity");
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
        Schema::dropIfExists('storeunits');
    }
}
