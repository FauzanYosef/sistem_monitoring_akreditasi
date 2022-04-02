<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLuaranLainnyasTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_luaran_lainnyas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hakcipta')->nullable();
            $table->string('penelitian')->nullable();
            $table->string('tahun')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}