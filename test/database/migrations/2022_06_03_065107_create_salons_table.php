<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('salon_id')->nullable(true);
            $table->string('salon_name')->nullable(true);
            $table->string('salon_type')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('zipcode')->nullable(true);
            $table->string('opening_timing')->nullable(true);
            $table->string('closing_timing')->nullable(true);
            $table->string('week_day')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('image')->nullable(true);
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
        Schema::dropIfExists('salons');
    }
}
