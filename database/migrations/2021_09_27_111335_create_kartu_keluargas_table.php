<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anggota_id')->unsigned();
            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('istri_id')->unsigned();
            // $table->foreign('istri_id')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('istri')->nullable();
            $table->string('nomor_kk')->nullable();
            $table->string('tempat')->nullable();
            $table->string('alamat')->nullable();
            $table->string('oleh')->nullable();
            $table->string('jam_nikah')->nullable();
            $table->string('jam_sipil')->nullable();
            $table->date('tgl_nikah')->nullable();
            $table->integer('sts_istri')->default(0);
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
        Schema::dropIfExists('kartu_keluargas');
    }
}
