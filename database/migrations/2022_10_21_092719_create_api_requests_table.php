<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('facebook')  ->default(0);
            $table->unsignedBigInteger('instagram') ->default(0);
            $table->unsignedBigInteger('twitter')   ->default(0);
            $table->unsignedBigInteger('reddit')    ->default(0);
            $table->unsignedBigInteger('pintrest')  ->default(0);
            $table->unsignedBigInteger('telegram')  ->default(0);
            $table->unsignedBigInteger('discord')   ->default(0);
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
        Schema::dropIfExists('api_requests');
    }
}
