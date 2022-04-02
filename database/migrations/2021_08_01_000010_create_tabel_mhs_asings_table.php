<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelMhsAsingsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_mhs_asings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ts_2')->nullable();
            $table->integer('ts_1')->nullable();
            $table->integer('ts')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}