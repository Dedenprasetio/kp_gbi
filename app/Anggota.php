<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = 'anggota';
    protected $fillable = ['kode_anggota', 'gambar', 
    'tgl_baptis', 'grj_baptis', 'asal_grj',
    'kota', 'kelurahan', 'kecamatan', 'provinsi', 'alamat',
    'jabatan_id', 'talenta_id', 'nij', 'nama', 'sts_keluarga', 'jk', 'tempat_lahir', 'gerwil',  'tgl_lahir',  'sts_dlm_klrg', 'sts_pernikahan',
    'alamat_domisili', 'kelurahan_domisili', 'kecamatan_domisili', 'kota_domisili', 'provinsi_domisili',
    'pendidikan', 'jurusan', 'goldar', 
    'ayah', 'ibu',
    'hp', 'sts_anggota', 'pekerjaan'];

    protected $dates = ['tgl_lahir'];


   
    public function jabatan()
    {
    	return $this->belongsTo(Jabatan::class);
    } 

    /**
     * Method One To Many 
     */
    public function transnikah()
    {
    	return $this->hasMany(TransNikah::class);
    }
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
        public function talenta()
    {
    	return $this->hasMany(Talenta::class);
    }
            public function nikah()
    {
    	return $this->hasMany(Nikah::class);
    }
}
