<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Istri extends Model
{
    protected $table = 'istri';
    protected $fillable = ['istri_id','kartukeluarga_id'];
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
