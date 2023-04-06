<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('gender', 40);
            $table->string('first_name', 40);
            $table->string('surname', 40);
            $table->string('username', 40)->unique();
            $table->string('email', 40);
            $table->string('phone', 40);
            $table->string('address', 255);
            $table->string('address_line1', 255);
            $table->string('address_line2', 255);
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('postal_code', 40);
            $table->string('country', 40);
            $table->string('password');
            $table->string('image', 255);
            $table->string('ver_code')->nullable();
            $table->dateTime('ver_code_sent_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('email_unverified')->default(0);
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
        Schema::dropIfExists('users');
    }
}
