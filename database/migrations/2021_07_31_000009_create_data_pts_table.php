<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPtsTable extends Migration
{
    public function up()
    {
        Schema::create('data_pts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kode_pt')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('jenis_pt')->nullable();
            $table->string('jenis_pengelolaan')->nullable();
            $table->string('status_pt')->nullable();
            $table->longText('alamat_pt')->nullable();
            $table->string('no_telp_pt')->nullable();
            $table->string('email_pt')->nullable();
            $table->string('web_pt')->nullable();
            $table->string('no_sk_pendirian_pt')->nullable();
            $table->date('tgl_sk_pendirian_pt')->nullable();
            $table->string('peringkat_akre_pt')->nullable();
            $table->string('no_sk_banpt')->nullable();
            $table->string('ts_pt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}