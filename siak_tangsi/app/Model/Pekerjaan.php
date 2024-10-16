<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    //
    protected $table = 'ref_pekerjaan';
    protected $hidden = ['created_at', 'updated_at'];
}
