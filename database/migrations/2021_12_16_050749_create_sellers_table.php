<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('userName',15);
            $table->string('password',255);
            $table->string('fullName',50);
            $table->bigInteger('nid',false,true);
            $table->string('phone',11);
            $table->string('mobile',11)->nullable();
            $table->string('email',40);
            $table->string('address',100);
            $table->string('image',100)->nullable();
            $table->integer('balance',false,true)->default(0);
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
        Schema::dropIfExists('sellers');
    }
}
