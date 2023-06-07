<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_marketings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(true);
            $table->string('dimension')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('facebook_image')->nullable(true);
            $table->string('salon_id')->nullable(true);
            $table->string('marketingtitle')->nullable(true);
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
        Schema::dropIfExists('facebook_marketings');
    }
}
