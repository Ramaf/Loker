<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokersTable extends Migration
{

    public function up()
    {
        Schema::create('lokers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('syarat');
            $table->string('kota');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('lokers');
    }
}
