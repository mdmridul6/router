<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sort_desc');
            $table->string('price');
            $table->boolean('status');
            $table->boolean('show_in_home');
            $table->json('benifit');
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
        Schema::dropIfExists('cms_packages');
    }
}
