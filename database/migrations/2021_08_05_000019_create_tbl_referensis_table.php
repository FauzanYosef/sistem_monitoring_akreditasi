<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblReferensisTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_referensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->integer('jumlah_ps')->nullable();
            $table->integer('banyak_lulusan_3')->nullable();
            $table->integer('banyak_lulusan_2')->nullable();
            $table->integer('banyak_lulusan')->nullable();
            $table->integer('nilai_lulusan_3')->nullable();
            $table->integer('nilai_lulusan_2')->nullable();
            $table->integer('nilai_lulusan_1')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}