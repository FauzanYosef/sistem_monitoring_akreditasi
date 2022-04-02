<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeprodisTable extends Migration
{
    public function up()
    {
        Schema::create('kodeprodis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_prodi')->nullable();
            $table->string('nama_prodi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}