<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRefPenilaiansTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_ref_penilaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->integer('jumlah_ps')->nullable();
            $table->integer('jml_lulusan_4')->nullable();
            $table->integer('jml_lulusan_3')->nullable();
            $table->integer('jml_lulusan')->nullable();
            $table->integer('jwb_lulusan_4')->nullable();
            $table->integer('jwb_lulusan_3')->nullable();
            $table->integer('jwb_lulusan_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}