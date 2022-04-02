<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelDsntdkTetapsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_dsntdk_tetaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pendidikan')->nullable();
            $table->integer('guru_besar')->nullable();
            $table->integer('lektor_kepala')->nullable();
            $table->integer('lektor')->nullable();
            $table->integer('asisten_ahli')->nullable();
            $table->integer('tenaga_pengajar')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}