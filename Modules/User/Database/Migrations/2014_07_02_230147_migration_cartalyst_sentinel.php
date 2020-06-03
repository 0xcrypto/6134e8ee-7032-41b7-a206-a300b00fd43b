<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.12
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationCartalystSentinel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->text('permissions')->nullable();
            $table->datetime('last_login')->nullable();
            $table->integer('created_by');
            $table->integer('reward_points')->default(0);
            $table->timestamps();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('employee_id');
            $table->integer('department_id');
            $table->text('address')->nullable();
            $table->date('joining_date');
            $table->boolean('job_type')->default(0);
            $table->integer('senior_id')->nullable();
            $table->string('device_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->text('permissions')->nullable();
            $table->boolean('is_direct_commission_applicable')->default(0);
            $table->timestamps();
        });

        Schema::create('role_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['role_id', 'locale']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::create('role_accessibilites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('accessible_role_id')->unsigned();
            $table->timestamps();

            $table->unique(['role_id', 'accessible_role_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('accessible_role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();

            $table->primary(['user_id', 'role_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    
        Schema::create('user_stores', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->timestamps();

            $table->primary(['user_id', 'store_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });

        Schema::create('activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('code');
            $table->boolean('completed')->default(false);
            $table->datetime('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('persistences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(false);
            $table->datetime('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('throttle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('type');
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('throttle');
        Schema::dropIfExists('reminders');
        Schema::dropIfExists('persistences');
        Schema::dropIfExists('activations');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('user_stores');
        Schema::dropIfExists('role_translations');
        Schema::dropIfExists('role_accessibilites');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('staffs');
        Schema::dropIfExists('users');
    }
}
