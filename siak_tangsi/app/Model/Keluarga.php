<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    //
    protected $table = 'tbl_keluarga';
    protected $hidden = ['created_at', 'updated_at'];

    public function user_modify()
    {
        return $this->belongsTo('App\Model\User', 'user_modified');
    }
    
}
