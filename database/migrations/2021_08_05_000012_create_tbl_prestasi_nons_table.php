<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPrestasiNonsTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_prestasi_nons', function (Blueprint $table) {
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