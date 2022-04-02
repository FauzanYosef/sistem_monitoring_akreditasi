<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelRekognisiDosensTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_rekognisi_dosens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen')->nullable();
            $table->string('keahlian')->nullable();
            $table->longText('rekognisi')->nullable();
            $table->string('tahun')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}