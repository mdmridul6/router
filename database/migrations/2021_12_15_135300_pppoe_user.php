<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PppoeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pppoe_users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('service');
            $table->string('profile');
            $table->date('active_date');
            $table->date('package_active_date')->nullable();
            $table->date('package_expire_date')->nullable();
            $table->date('active_after')->nullable();
            $table->date('deactive_after')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_free')->default(false);
            $table->integer('seller_id')->nullable();
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
        Schema::dropIfExists('pppoe_users');
    }
}
