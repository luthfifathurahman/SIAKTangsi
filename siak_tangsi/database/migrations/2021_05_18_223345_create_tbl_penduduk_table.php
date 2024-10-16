<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama',150);
            $table->string('tempat',30);
            $table->date('tgl_lahir');
            $table->integer('jenkel_id')->length(11)->unsigned();
            $table->integer('goldar_id')->length(11)->unsigned();
            $table->integer('kewarganegaraan_id')->length(11)->unsigned();
            $table->integer('agama_id')->length(11)->unsigned();
            $table->integer('pendidikan_id')->length(11)->unsigned();
            $table->integer('pekerjaan_id')->length(11)->unsigned();
            $table->integer('user_modified')->length(11)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_penduduk');
    }
}
