<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->biginteger('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->string('product_name');
            $table->string('product_unique_id');
            $table->biginteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->tinyInteger('year');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->date('start_at');
            $table->string('start_price');
            $table->string('image')->nullable();
            $table->string('catlogue_no')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('live_count')->default(0);
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
        Schema::dropIfExists('products');
    }
}
