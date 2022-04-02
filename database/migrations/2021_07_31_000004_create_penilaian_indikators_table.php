<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianIndikatorsTable extends Migration
{
    public function up()
    {
        Schema::create('penilaian_indikators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('pilihan_penilaian')->nullable();
            $table->string('label_nilai')->nullable();
            $table->integer('skor_nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}