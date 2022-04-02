<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataProdisTable extends Migration
{
    public function up()
    {
        Schema::table('data_prodis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pt_id')->nullable();
            $table->foreign('id_pt_id', 'id_pt_fk_4479853')->references('id')->on('data_pts');
            $table->unsignedBigInteger('kode_prodi_id')->nullable();
            $table->foreign('kode_prodi_id', 'kode_prodi_fk_4498231')->references('id')->on('kodeprodis');
        });
    }
}