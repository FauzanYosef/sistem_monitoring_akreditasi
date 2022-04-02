<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLamaStudisTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_lama_studis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->integer('jumlah_ps')->nullable();
            $table->integer('jml_lulusan_2')->nullable();
            $table->integer('jml_lulusan_1')->nullable();
            $table->integer('jml_lulusan')->nullable();
            $table->float('average_masa_2', 3, 2)->nullable();
            $table->float('average_masa_1', 3, 2)->nullable();
            $table->float('average_masa', 3, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}