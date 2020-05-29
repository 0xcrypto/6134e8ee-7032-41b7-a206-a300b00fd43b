<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('store_unit_id')->unsigned();
            $table->double('quantity')->default(0);
            $table->integer('in_stock')->default(0);
            $table->timestamps();
            $table->foreign('store_unit_id')
                  ->references('id')->on('store_units')->onDelete('cascade');
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
        Schema::dropIfExists('unit_products');
    }
}
