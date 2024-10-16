<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //
    protected $table = 'tbl_penduduk';
    protected $hidden = ['created_at', 'updated_at'];

    public function agama()
    {
        return $this->belongsTo('App\Model\Agama', 'agama_id');
    }

    public function kewarganegaraan()
    {
        return $this->belongsTo('App\Model\Kewarganegaraan', 'kewarganegaraan_id');
    }

    public function jenkel()
    {
        return $this->belongsTo('App\Model\JenisKelamin', 'jenkel_id');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Model\Pendidikan', 'pendidikan_id');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('App\Model\Pekerjaan', 'pekerjaan_id');
    }

    public function goldar()
    {
        return $this->belongsTo('App\Model\GolDar', 'goldar_id');
    }

    public function user_modify()
    {
        return $this->belongsTo('App\Model\User', 'user_modified');
    }
}
