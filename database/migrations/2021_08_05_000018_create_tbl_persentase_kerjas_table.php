<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPersentaseKerjasTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_persentase_kerjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_pendidikan')->nullable();
            $table->float('persen_4', 4, 2)->nullable();
            $table->float('persen_3', 4, 2)->nullable();
            $table->float('persen_2', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}