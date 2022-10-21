<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLimitsTable extends Migration
{
    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')                    ;
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('allocated')->default(25)     ;
            $table->unsignedBigInteger('utilized')->default(0)       ;
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
        Schema::dropIfExists('request_limits');
    }
}
