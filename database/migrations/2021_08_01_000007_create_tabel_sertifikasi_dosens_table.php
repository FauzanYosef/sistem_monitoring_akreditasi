<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelSertifikasiDosensTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_sertifikasi_dosens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_pengelola')->nullable();
            $table->integer('jml_dosen')->nullable();
            $table->integer('jml_dosen_sertifikat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}