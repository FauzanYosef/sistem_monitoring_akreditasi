<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRasioLulusTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_rasio_lulus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prodi')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->integer('jml_mhs_6')->nullable();
            $table->integer('jml_mhs_5')->nullable();
            $table->integer('jml_mhs_4')->nullable();
            $table->integer('jml_mhs_3')->nullable();
            $table->integer('jml_mhs_2')->nullable();
            $table->integer('jml_mhs_1')->nullable();
            $table->integer('jml_mhs')->nullable();
            $table->integer('jml_lulusan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}