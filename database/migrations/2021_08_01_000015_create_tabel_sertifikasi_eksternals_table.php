<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelSertifikasiEksternalsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_sertifikasi_eksternals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lembaga_akreditasi')->nullable();
            $table->string('jenis_akreditasi')->nullable();
            $table->string('lingkup')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}