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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('public_image')->nullable();
            $table->string('mark_id')->nullable();
            $table->foreignId('place');
            $table->string('price');
            $table->longText('about')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('color_id')->nullable();
            $table->foreignId('products_id')->nullable();
            $table->boolean('is_new');
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
        Schema::dropIfExists('events');
    }
};
