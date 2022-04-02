<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFormEssaisTable extends Migration
{
    public function up()
    {
        Schema::table('form_essais', function (Blueprint $table) {
            $table->unsignedBigInteger('elemen_id')->nullable();
            $table->foreign('elemen_id', 'elemen_fk_4552579')->references('id')->on('indikator_penilaians');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4820445')->references('id')->on('users');
        });
    }
}