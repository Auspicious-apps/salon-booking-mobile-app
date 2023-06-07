<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable(true);
            $table->string('salon_id')->nullable(true);
            $table->string('customer_id')->nullable(true);
            $table->string('staff_id')->nullable(true);
            $table->string('start_time')->nullable(true);
            $table->string('end_time')->nullable(true);
            $table->string('services_taken')->nullable(true);
            $table->string('total_cost')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('cutomer_note')->nullable(true);
            $table->string('status')->default('1');
            $table->timestamps();
            $table->string('booking_date')->nullable(true);
            $table->string('booking_time')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
