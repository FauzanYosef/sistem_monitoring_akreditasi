<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKepuasansTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_kepuasans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aspek_penilaian')->nullable();
            $table->float('hasil_penilaian_4', 4, 2)->nullable();
            $table->float('hasil_penilaian_3', 4, 2)->nullable();
            $table->float('hasil_penilaian_2', 4, 2)->nullable();
            $table->float('hasil_penilaian', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}