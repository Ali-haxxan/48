<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->biginteger('category')->unsigned();
            $table->foreign('category')->references('id')->on('categories');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->biginteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->biginteger('catalogue_id')->unsigned();
            $table->foreign('catalogue_id')->references('id')->on('catalogenrs');


            $table->string('catalogue_category');
            $table->string('catalogue_number');
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
        Schema::dropIfExists('alerts');
    }
}
