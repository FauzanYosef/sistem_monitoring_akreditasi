<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeniliaianAssesorsTable extends Migration
{
    public function up()
    {
        Schema::create('peniliaian_assesors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}