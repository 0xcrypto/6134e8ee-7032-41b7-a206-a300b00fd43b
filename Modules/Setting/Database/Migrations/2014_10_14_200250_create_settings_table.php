<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->boolean('is_translatable')->default(false);
            $table->text('plain_value')->nullable();
            $table->timestamps();
        });

        Schema::create('setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setting_id')->unsigned();
            $table->string('locale');
            $table->text('value')->nullable();

            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('department_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['department_id', 'locale']);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });

        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('ticket_status_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_status_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['ticket_status_id', 'locale']);
            $table->foreign('ticket_status_id')->references('id')->on('ticket_statuses')->onDelete('cascade');
        });

        Schema::create('ticket_priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('ticket_priority_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_priority_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['ticket_priority_id', 'locale']);
            $table->foreign('ticket_priority_id')->references('id')->on('ticket_priorities')->onDelete('cascade');
        });

        Schema::create('ticket_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('ticket_service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_service_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['ticket_service_id', 'locale']);
            $table->foreign('ticket_service_id')->references('id')->on('ticket_services')->onDelete('cascade');
        });

        Schema::create('task_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('task_status_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_status_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['task_status_id', 'locale']);
            $table->foreign('task_status_id')->references('id')->on('task_statuses')->onDelete('cascade');
        });

        Schema::create('task_priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('task_priority_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_priority_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['task_priority_id', 'locale']);
            $table->foreign('task_priority_id')->references('id')->on('task_priorities')->onDelete('cascade');
        });

        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('lead_status_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_status_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['lead_status_id', 'locale']);
            $table->foreign('lead_status_id')->references('id')->on('lead_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_status_translations');
        Schema::dropIfExists('task_statuses');
        Schema::dropIfExists('task_priority_translations');
        Schema::dropIfExists('task_priorities');
        Schema::dropIfExists('lead_status_translations');
        Schema::dropIfExists('lead_statuses');
        Schema::dropIfExists('department_translations');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('ticket_status_translations');
        Schema::dropIfExists('ticket_statuses');
        Schema::dropIfExists('ticket_priority_translations');
        Schema::dropIfExists('ticket_priorities');
        Schema::dropIfExists('ticket_service_translations');
        Schema::dropIfExists('ticket_services');
        Schema::dropIfExists('setting_translations');
        Schema::dropIfExists('settings');
    }
}
