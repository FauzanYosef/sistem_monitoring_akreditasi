<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPrestasiAkademiksTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_prestasi_akademiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kegiatan')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tingkat')->nullable();
            $table->longText('prestasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}