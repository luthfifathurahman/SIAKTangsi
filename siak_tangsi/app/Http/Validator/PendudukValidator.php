<?php

namespace App\Http\Validator;

use Request;
use Validator;
use App\Model\Penduduk;

class PendudukValidator
{
	public static function login($request)
	{
		$data = [
			'status' => false,
			'error' => [],
			'data' => []
		];	
		
    	$validator = Validator::make($request, [
    		'nik' => 'required|unique|min:16|max:16|integer',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required|date_format:Y-m-d',
    	]);

    	if($validator->fails()) {
    		$data['error'] = $validator->errors()->toArray();
    		return $data;
    	} else {
    		$data['status'] = true;
    		return $data;
    	}    			
    }
    

}