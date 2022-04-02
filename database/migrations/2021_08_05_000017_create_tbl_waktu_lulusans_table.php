<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWaktuLulusansTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_waktu_lulusans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->float('average_tunggu_4', 4, 2)->nullable();
            $table->float('average_tunggu_3', 4, 2)->nullable();
            $table->float('average_tunggu_2', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}