<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataProdisTable extends Migration
{
    public function up()
    {
        Schema::create('data_prodis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenjang_prodi')->nullable();
            $table->string('telp_prodi')->nullable();
            $table->string('email_prodi')->nullable();
            $table->string('web_prodi')->nullable();
            $table->string('alamat_prodi')->nullable();
            $table->string('status_prodi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}