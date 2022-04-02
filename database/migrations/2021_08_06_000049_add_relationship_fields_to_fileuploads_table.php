<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFileuploadsTable extends Migration
{
    public function up()
    {
        Schema::table('fileuploads', function (Blueprint $table) {
            $table->unsignedBigInteger('namafile_id')->nullable();
            $table->foreign('namafile_id', 'namafile_fk_4551072')->references('id')->on('borangs');
        });
    }
}