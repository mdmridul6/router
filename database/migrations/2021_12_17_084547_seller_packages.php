<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellerPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('packages_id');
            $table->decimal('amount',8,2,true);
            $table->foreign('seller_id')->references('id')->on('sellers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('packages_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('seller_packages');
    }
}
