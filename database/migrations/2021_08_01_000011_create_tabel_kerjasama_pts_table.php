<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelKerjasamaPtsTable extends Migration
{
    public function up()
    {
        Schema::create('tabel_kerjasama_pts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lembaga')->nullable();
            $table->string('tingkat')->nullable();
            $table->longText('bentuk')->nullable();
            $table->string('berlaku')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}