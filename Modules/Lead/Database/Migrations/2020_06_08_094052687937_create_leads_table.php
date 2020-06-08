<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('lead_status_id');
            $table->integer('created_by');
            $table->integer('assigned_to')->nullable();
            $table->boolean('is_deleted')->nullable();
            $table->integer('last_contacted_by')->nullable();
            $table->dateTime('last_contacted')->nullable();
            $table->timestamps();
        });

        Schema::create('lead_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->integer('module_item_id');
            $table->text('body');
            $table->integer('added_by');
            $table->timestamps();
        });

        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->integer('module_item_id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->integer('priority_id');
            $table->integer('assigned_to');
            $table->integer('status_id');
            $table->timestamps();
        });

        Schema::create('general_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->integer('module_item_id');
            $table->integer('send_reminder_to');
            $table->integer('date_to_be_notified');
            $table->text('description');
            $table->boolean('is_notified');
            $table->integer('created_by');
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
        Schema::dropIfExists('lead_products');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('task');
        Schema::dropIfExists('general_reminders');
    }
}
