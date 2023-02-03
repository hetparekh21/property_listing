<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name');
            $table->binary('img');
            $table->string('tags');
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id('property_id');
            $table->string('property_name');
            $table->string('description');
            $table->string('location');
            $table->string('price');
            $table->string('tags');
            $table->foreignId('category_category_id');
        });

        Schema::create('prop_img', function (Blueprint $table) {
            $table->id('img_id');
            $table->binary('img');
            $table->foreignId('property_property_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('prop_img');
    }
};
