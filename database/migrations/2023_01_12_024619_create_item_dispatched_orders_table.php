<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDispatchedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_dispatched_orders', function (Blueprint $table) {
            $table->id();
            $table->biginteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->biginteger('buyer_id')->unsigned();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->biginteger('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('users');
            $table->biginteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('dispatched_statuses');
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
        Schema::dropIfExists('item_dispatched_orders');
    }
}
