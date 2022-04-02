<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAuditKeuangansTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_audit_keuangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lembaga_audit')->nullable();
            $table->string('tahun')->nullable();
            $table->longText('opini')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}