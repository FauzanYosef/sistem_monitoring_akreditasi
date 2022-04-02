<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTabelAkreditasiProdisTable extends Migration
{
    public function up()
    {
        Schema::table('tabel_akreditasi_prodis', function (Blueprint $table) {
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id', 'prodi_fk_4507938')->references('id')->on('kodeprodis');
        });
    }
}