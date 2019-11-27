<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('name')->nullable();
            $table->string('avatar_url');
            $table->string('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('html_url');
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
        Schema::dropIfExists('devs');
    }
}
