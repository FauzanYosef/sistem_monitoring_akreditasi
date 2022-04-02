<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorPenilaiansTable extends Migration
{
    public function up()
    {
        Schema::create('indikator_penilaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('elemen');
            $table->longText('elemen_indikator')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}