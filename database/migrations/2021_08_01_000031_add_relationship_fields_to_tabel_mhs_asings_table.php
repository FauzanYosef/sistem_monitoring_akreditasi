<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTabelMhsAsingsTable extends Migration
{
    public function up()
    {
        Schema::table('tabel_mhs_asings', function (Blueprint $table) {
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id', 'prodi_fk_4508867')->references('id')->on('kodeprodis');
        });
    }
}