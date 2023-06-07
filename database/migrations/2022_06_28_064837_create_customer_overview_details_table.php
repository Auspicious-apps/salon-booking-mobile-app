<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOverviewDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_overview_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable(true);
            $table->string('appointment_no')->nullable(true);
            $table->string('customer_name')->nullable(true);
            $table->string('customerDate')->nullable(true);
            $table->string('customerTime')->nullable(true);
            $table->string('appointedHairdresser')->nullable(true);
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
        Schema::dropIfExists('customer_overview_details');
    }
}
