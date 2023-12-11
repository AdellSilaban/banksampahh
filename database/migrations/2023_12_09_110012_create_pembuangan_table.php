<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembuangan', function (Blueprint $table) {
            $table->bigIncrements('id_pembuangan');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->string('nama_petugas');
	        $table->string('no_tlp_petugas');
            $table->integer('kapasitas_an');
	        $table->integer('kapasitas_or');
            $table->string('nama_instansi');
            $table->date('tgl_pembuangan');
            $table->string('status');
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
        Schema::dropIfExists('pembuangan');
    }
}
