<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKartuKeluarga extends Model
{
    protected $table = 'detail_kartu_keluarga';
    protected $fillable = ['anggota_id', 'kartukeluarga_id'];
    protected $dates = ['tgl_lahir'];
    

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 

    public function kartukeluarga()
    {
    	return $this->belongsTo(KartuKeluarga::class);
    } 
}
