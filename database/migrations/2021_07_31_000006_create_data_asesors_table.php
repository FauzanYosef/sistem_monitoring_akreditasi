<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAsesorsTable extends Migration
{
    public function up()
    {
        Schema::create('data_asesors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip_assesor')->nullable();
            $table->string('nama_asesor')->nullable();
            $table->string('email_assesor')->nullable();
            $table->string('telp_asesor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}