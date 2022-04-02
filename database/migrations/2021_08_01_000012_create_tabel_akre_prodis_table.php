<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAkreProdisTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_akre_prodis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status_akreditasi')->nullable();
            $table->integer('jml_doktor')->nullable();
            $table->integer('jml_magister')->nullable();
            $table->integer('jml_sarjana')->nullable();
            $table->integer('jml_profesi_2')->nullable();
            $table->integer('jml_profesi_1')->nullable();
            $table->integer('jml_profesi')->nullable();
            $table->integer('jml_vokasi_1')->nullable();
            $table->integer('jml_vokasi_2')->nullable();
            $table->integer('jml_vokasi_4')->nullable();
            $table->integer('jml_vokasi_5')->nullable();
            $table->integer('jml_vokasi_6')->nullable();
            $table->integer('jml_vokasi_7')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}