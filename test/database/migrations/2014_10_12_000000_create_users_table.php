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
            $table->string('user_type')->nullable(true);
            $table->string('first_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('user_name')->nullable(true);
            $table->string('email')->unique();
            $table->string('password')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('facebook_id')->nullable(true);
            $table->string('facebook_token')->nullable(true);
            $table->string('salon_id')->nullable(true);
            $table->string('street_address')->nullable(true);
            $table->string('city')->nullable(true);
             $table->string('state')->nullable(true);
            $table->string('zipcode')->nullable(true);
            $table->string('status')->default('1');
            $table->string('saloon_name')->nullable(true);
            $table->string('identify')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('saloon_status')->nullable(true);
            $table->timestamp('email_verified_at')->nullable(true);
            $table->rememberToken();
            $table->timestamp('OTP_number')->nullable(true);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
