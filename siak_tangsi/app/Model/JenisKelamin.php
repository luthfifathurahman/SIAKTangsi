<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    //
    protected $table = 'ref_jenkel';
    protected $hidden = ['created_at', 'updated_at'];

    public function penduduk()
    {
        return $this->hasMany('App\Model\Penduduk', 'id');
    }

    public function pindah()
    {
        return $this->hasMany('App\Model\Pindah', 'id');
    }

}
