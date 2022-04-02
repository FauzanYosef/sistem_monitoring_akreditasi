<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelRasioDsnMhsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_rasio_dsn_mhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_pengelola')->nullable();
            $table->integer('jml_dosen')->nullable();
            $table->integer('jml_mhs')->nullable();
            $table->integer('jml_mhs_ta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}