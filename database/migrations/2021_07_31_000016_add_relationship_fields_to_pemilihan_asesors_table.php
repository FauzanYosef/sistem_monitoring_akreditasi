<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPemilihanAsesorsTable extends Migration
{
    public function up()
    {
        Schema::table('pemilihan_asesors', function (Blueprint $table) {
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id', 'prodi_fk_4480065')->references('id')->on('kodeprodis');
            $table->unsignedBigInteger('id_assesor_id')->nullable();
            $table->foreign('id_assesor_id', 'id_assesor_fk_4480066')->references('id')->on('data_asesors');
        });
    }
}