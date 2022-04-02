<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTempatKerjasTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_tempat_kerjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->integer('jml_lulusan')->nullable();
            $table->integer('tingkat_1')->nullable();
            $table->integer('tingkat_2')->nullable();
            $table->integer('tingkat_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}