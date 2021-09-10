<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_anggota');
            $table->string('nama'); 
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            
            $table->string('kota')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kecamatan')->nullable();
            
            
            $table->enum('gerwil', ['Tengah', 'Timur', 'Barat', 'Selatan', 'Utara','Belum']);
            $table->string('pekerjaan')->nullable();
            $table->string('pernikahan')->nullable(); 
            $table->string('sts_keluarga')->nullable();
            $table->string('gambar')->nullable();
            $table->string('hp')->nullable(); 
            $table->enum('sts_anggota', ['Jemaat', 'Simpatisan']);

            //TAMBAHAN
            $table->string('sts_dlm_klrg')->nullable();
            $table->enum('sts_pernikahan', ['Belum', 'Menikah', 'Janda', 'Duda']); 
            
            $table->string('alamat_domisili')->nullable();
            $table->string('kelurahan_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            
            $table->enum('goldar', ['A', 'B', 'AB', 'O', 'RH+', 'RH'])->nullable();

            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();

            $table->date('tgl_baptis')->nullable();
            $table->string('grj_baptis')->nullable();
            $table->string('asal_grj')->nullable();

            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
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
        Schema::dropIfExists('anggotas');
    }
}
