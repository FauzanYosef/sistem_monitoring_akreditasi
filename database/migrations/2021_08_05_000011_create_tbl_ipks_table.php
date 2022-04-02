<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIpksTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_ipks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->integer('jumlah_ps')->nullable();
            $table->integer('jml_lulusan_2')->nullable();
            $table->integer('jml_lulusan_1')->nullable();
            $table->integer('jml_lulusan')->nullable();
            $table->float('average_ipk_2', 3, 2)->nullable();
            $table->float('average_ipk_1', 3, 2)->nullable();
            $table->float('average_ipk', 3, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}