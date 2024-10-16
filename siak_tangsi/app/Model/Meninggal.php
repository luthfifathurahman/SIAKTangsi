<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    //
    protected $table = 'tbl_meninggal';
    protected $hidden = ['created_at', 'updated_at'];

    public function jenkel()
    {
        return $this->belongsTo('App\Model\JenisKelamin', 'jenkel_id');
    }
    
    public function user_modify()
    {
        return $this->belongsTo('App\Model\User', 'user_modified');
    }
    
}
