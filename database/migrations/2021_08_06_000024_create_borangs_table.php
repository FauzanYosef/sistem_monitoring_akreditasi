<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangsTable extends Migration
{
    public function up()
    {
        Schema::create('borangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}