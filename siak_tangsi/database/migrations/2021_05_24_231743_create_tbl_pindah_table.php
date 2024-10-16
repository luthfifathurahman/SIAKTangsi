<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPindahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pindah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kk',16);
            $table->string('nik',16);
            $table->string('nama',100);
            $table->date('tanggal');
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
        Schema::dropIfExists('tbl_pindah');
    }
}
