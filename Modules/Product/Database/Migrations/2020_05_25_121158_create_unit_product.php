<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_unit_products', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('storeunit_id')->unsigned();
            $table->double('quantity');
            $table->timestamps();

            $table->foreign('storeunit_id')
                  ->references('id')->on('storeunits')->onDelete('cascade');

            $table->foreign('product_id')
                  ->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
