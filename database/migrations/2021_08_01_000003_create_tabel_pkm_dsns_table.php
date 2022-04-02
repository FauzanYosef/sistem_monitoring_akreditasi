<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPkmDsnsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_pkm_dsns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sumber_biaya')->nullable();
            $table->integer('jml_judul_1')->nullable();
            $table->integer('jml_judul_2')->nullable();
            $table->integer('jml_judul_3')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}