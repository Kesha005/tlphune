<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCShopproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_shopproducts', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id');
            $table->string('name');
            $table->string('image');
            $table->integer('price');
            $table->string('image1')->nullable();
            $table->string('mark_id');
            $table->string('about');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('c_shopproducts');
    }
}
