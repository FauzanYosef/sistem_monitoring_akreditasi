<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEssaisTable extends Migration
{
    public function up()
    {
        Schema::create('form_essais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('isi_essai')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}