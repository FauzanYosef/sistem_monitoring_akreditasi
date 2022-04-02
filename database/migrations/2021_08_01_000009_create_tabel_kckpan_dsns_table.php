<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelKckpanDsnsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_kckpan_dsns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pengelola')->nullable();
            $table->integer('doktor')->nullable();
            $table->integer('magister')->nullable();
            $table->integer('profesi')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}