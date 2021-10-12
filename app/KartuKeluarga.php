<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluargas';
    protected $fillable = ['anggota_id', 'nomor_kk'];
    // protected $timestamps = false;


    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 

    public function detailkartukeluarga()
    {
    	return $this->hasOne(DetailKartuKeluarga::class);
    }
}
