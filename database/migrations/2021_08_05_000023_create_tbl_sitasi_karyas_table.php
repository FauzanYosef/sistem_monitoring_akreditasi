<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSitasiKaryasTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_sitasi_karyas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_penulis')->nullable();
            $table->longText('artikel')->nullable();
            $table->integer('jml_artiker')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}