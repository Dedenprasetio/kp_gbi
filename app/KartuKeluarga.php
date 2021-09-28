<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluargas';
    protected $fillable = ['anggota_id', 'nomor_kk'];


    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 
}
