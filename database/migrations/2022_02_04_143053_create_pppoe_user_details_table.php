<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePppoeUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pppoe_user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('pppoe_id');
            $table->string('name');
            $table->string('phone');
            $table->string('mobile')->nullable();
            $table->string('address');
            $table->foreign('pppoe_id')->references('id')->on('pppoe_users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pppoe_user_details');
    }
}
