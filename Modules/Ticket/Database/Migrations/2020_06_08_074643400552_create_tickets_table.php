<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('source')->default(0); // 0: Offline, 1: Online
            $table->string('subject');
            $table->text('description')->nullable();
            $table->integer('customer_id')->nullable()->unsigned();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('service_id')->nullable()->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('store_id')->nullable()->unsigned();
            $table->integer('assigned_to')->nullable()->unsigned();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('tickets');
    }
}
