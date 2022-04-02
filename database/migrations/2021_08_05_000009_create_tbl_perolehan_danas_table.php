<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPerolehanDanasTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_perolehan_danas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sumber_dana')->nullable();
            $table->string('jenis_dana')->nullable();
            $table->decimal('jml_ts_2', 15, 2)->nullable();
            $table->decimal('jml_dana_ts_1', 15, 2)->nullable();
            $table->decimal('jml_dana_ts', 15, 2)->nullable();
            $table->decimal('jml', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}