<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelSeleksimhsbarusTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_seleksimhsbarus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_studi')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->integer('daya_tampung')->nullable();
            $table->integer('jumlah_calon_pendaftar')->nullable();
            $table->integer('jumlah_lulus_seleksi')->nullable();
            $table->integer('jml_mhs_baru_reguler')->nullable();
            $table->integer('jml_mhs_transfer')->nullable();
            $table->integer('total_mhs_reguler')->nullable();
            $table->integer('total_mhs_transfer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}