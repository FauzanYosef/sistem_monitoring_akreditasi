<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPenilaianIndikatorsTable extends Migration
{
    public function up()
    {
        Schema::table('penilaian_indikators', function (Blueprint $table) {
            $table->unsignedBigInteger('indikator_skor_id')->nullable();
            $table->foreign('indikator_skor_id', 'indikator_skor_fk_4479846')->references('id')->on('indikator_penilaians');
        });
    }
}