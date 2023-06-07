<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('salon_id')->nullable(true);
            $table->string('first_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('date_of_birth')->nullable(true);
            $table->string('position')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('contact_number')->nullable(true);
            $table->string('street_address')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('country')->nullable(true);
            $table->string('hourly_rate')->nullable(true);
            $table->string('color')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('vacation_from')->nullable(true);
            $table->string('vacation_to')->nullable(true);
            $table->string('services_provided')->nullable(true);
            $table->string('status')->default('1');
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
        Schema::dropIfExists('staff');
    }
}
