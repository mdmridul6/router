<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('logo', 100)->nullable();
            $table->boolean('use_logo')->nullable()->default(false);
            $table->string('site_color',7)->nullable()->default("#007fc4");
            $table->string('phone', 16)->nullable();
            $table->string('email', 22)->nullable();
            $table->string('address', 22)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('about_us_image', 50)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
