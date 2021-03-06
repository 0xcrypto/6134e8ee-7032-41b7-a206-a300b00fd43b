<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_class_id')->unsigned()->nullable();
            $table->string('slug')->unique();
            $table->decimal('price', 18, 4)->unsigned();
            $table->decimal('special_price', 18, 4)->unsigned()->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->decimal('selling_price', 18, 4)->unsigned()->nullable();
            $table->string('sku')->nullable();
            $table->boolean('manage_stock');
            $table->integer('qty')->nullable();
            $table->boolean('in_stock');
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active');
            $table->datetime('new_from')->nullable();
            $table->datetime('new_to')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unit_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('store_unit_id')->unsigned();
            $table->integer('quantity')->unsigned()->default(0);
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
        Schema::dropIfExists('products');
    }
}
