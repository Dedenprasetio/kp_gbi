<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('istri_id')->unsigned();
            $table->foreign('istri_id')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('kartukeluarga_id')->unsigned();
            $table->foreign('kartukeluarga_id')->references('id')->on('kartu_keluargas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('istri');
    }
}
