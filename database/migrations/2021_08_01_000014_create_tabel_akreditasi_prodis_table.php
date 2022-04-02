<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAkreditasiProdisTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_akreditasi_prodis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lembaga_akreditasi_internasional')->nullable();
            $table->string('peringkat')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}