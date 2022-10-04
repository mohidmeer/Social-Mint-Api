<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->forigen('user_id')->refrences('id')->on('users');
            $table->string('name');
            $table->text('avatar')->nullable();
            $table->string('access_token');
            $table->string('refresh_token');
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
        Schema::dropIfExists('discords');
    }
}
