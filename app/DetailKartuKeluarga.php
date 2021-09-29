<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKartuKeluarga extends Model
{
    protected $table = 'detail_kartu_keluarga';
    protected $fillable = ['anggota_id'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 
}
