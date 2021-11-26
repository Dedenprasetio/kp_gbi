<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluargas';
    protected $fillable = ['anggota_id','istri', 'nomor_kk','tempat','alamat','oleh','jam_nikah','jam_sipil','tgl_nikah'];
    


    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 

    public function detailkartukeluarga()
    {
    	return $this->hasOne(DetailKartuKeluarga::class);
    }
}
