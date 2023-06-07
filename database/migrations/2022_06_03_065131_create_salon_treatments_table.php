<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('salon_id')->nullable(true);
            $table->string('treatment_category')->nullable(true);
            $table->string('staff_id')->nullable(true);
            $table->string('treatment_name')->nullable(true);
            $table->string('treatment_rate')->nullable(true);
            $table->string('treatment_hours')->nullable(true);
            $table->string('treatment_minute')->nullable(true);
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
        Schema::dropIfExists('salon_treatments');
    }
}
