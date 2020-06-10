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
            $table->boolean('source')->default(0); //0=Offline, 1=Online
            $table->text('description')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->integer('lead_status_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('store_id')->nullable()->unsigned();
            $table->integer('order_id')->nullable()->unsigned();
            $table->integer('assigned_to')->nullable()->unsigned();
            $table->integer('last_contacted_by')->nullable()->unsigned();
            $table->boolean('is_deleted')->default(0);
            $table->dateTime('last_contacted')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('lead_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->integer('created_by')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('assigned_to')->nullable()->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('priority_id')->references('id')->on('task_priorities')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('cascade');
        });

        Schema::create('general_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->integer('module_item_id');
            $table->integer('send_reminder_to')->unsigned();
            $table->integer('date_to_be_notified');
            $table->text('description')->nullable();
            $table->boolean('is_notified')->default(0);
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('send_reminder_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
        Schema::dropIfExists('general_reminders');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('lead_products');
        Schema::dropIfExists('leads');
    }
}
