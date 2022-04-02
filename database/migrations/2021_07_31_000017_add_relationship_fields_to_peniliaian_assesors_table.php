<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeniliaianAssesorsTable extends Migration
{
    public function up()
    {
        Schema::table('peniliaian_assesors', function (Blueprint $table) {
            $table->unsignedBigInteger('id_assesor_id')->nullable();
            $table->foreign('id_assesor_id', 'id_assesor_fk_4480213')->references('id')->on('pemilihan_asesors');
            $table->unsignedBigInteger('id_skor_id')->nullable();
            $table->foreign('id_skor_id', 'id_skor_fk_4480214')->references('id')->on('penilaian_indikators');
        });
    }
}