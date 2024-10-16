<?php

namespace App\Http\Controllers\Backend;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\Meninggal;
use App\Model\JenisKelamin;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Validator;

class MeninggalController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meninggal = DB::table('tbl_meninggal')->get();
        $segment = \Request::segment(2);
        $userinfo = Session::get('userinfo');
        $access_control = Session::get('access_control');

        return view ('backend.meninggal.index')->with(['meninggal' => $meninggal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jenkel = JenisKelamin::pluck('jenkel','id');
		return view ('backend.meninggal.update', ['jenkel' => $jenkel] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[]);
		
		$nik = $request->nik;

		$ceknik = Meninggal::where('nik',$nik)->get()->count();

		if($ceknik > 0){
			$validator->getMessageBag()->add('nik', '*) NIK Sudah Pernah Digunakan');
		} else{
            $data = new Meninggal();
            $data->no_kk = $request->no_kk;
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->jenkel_id = $request->jenkel_id;
            $data->tanggal = date('Y-m-d',strtotime($request->tanggal));
            $data->user_modified = Session::get('userinfo')['user_id'];
            if($data->save()){
                return Redirect::to('/backend/meninggal')->with('success', "Data saved successfully")->with('mode', 'success');
            }
        }
        return Redirect::to('/backend/meninggal/tambah')
				->withErrors($validator)
				->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$data = Meninggal::with(['user_modify'])->where('id', $id)->get();
		
        if ($data->count() > 0){
			return view ('backend.meninggal.view', ['data' => $data]);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Meninggal::where('id', $id)->get();
        $jenkel = JenisKelamin::pluck('jenkel','id');

        return view ('backend.meninggal.update', ['data' => $data, 'jenkel' => $jenkel]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //
            $data = Meninggal::find($id);
            $data->no_kk = $request->no_kk;
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->jenkel_id = $request->jenkel_id;
            $data->tanggal = date('Y-m-d',strtotime($request->tanggal));
            $data->user_modified = Session::get('userinfo')['user_id'];
            if($data->save()){
                return Redirect::to('/backend/meninggal')->with('success', "Data saved successfully")->with('mode', 'success');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
		$data = Meninggal::find($id);
		if($data->delete()){
            return Redirect::to('/backend/meninggal');
        }
    }
	
	public function datatable() {	
		$userinfo = Session::get('userinfo');
		$data = Meninggal::where('id', '!=', 0);
	
        return Datatables::of($data)
			->addColumn('action', function ($data) {
				$userinfo = Session::get('userinfo');
				$access_control = Session::get('access_control');
				$segment =  \Request::segment(2);
				$url_edit = url('backend/meninggal/'.$data->id.'/ubah');
                $url_delete = url('backend/meninggal/hapus/'.$data->id);
				$url = url('backend/meninggal/'.$data->id);
                $view = "<a class='btn-action btn btn-primary btn-view' href='".$url."' title='View'><i class='fa fa-eye'></i></a>";
				$edit = "<a class='btn-action btn btn-info btn-edit' href='".$url_edit."' title='Edit'><i class='fa fa-edit'></i></a>";
                $delete = "<a href='".$url_delete."'id='btnhapus' class='btn-action btn btn-danger'  title='Delete'><i class='fa fa-trash-o'></i></a>";
				if (!empty($access_control)) {
					if ($access_control[$userinfo['user_level_id']][$segment] == "v"){
						return $view;
					} else if ($access_control[$userinfo['user_level_id']][$segment] == "vu"){
						return $view." ".$edit;
					} else if ($access_control[$userinfo['user_level_id']][$segment] == "a"){
						return $view." ".$edit." ".$delete;
					}
				} else {
					return "";
				}
            })
            ->make(true);		
	}

	public function datatable_meninggal() {
		$data = Pindah::select('tbl_meninggal.*')
		 ->where('tbl_meninggal.id', '!=', 0);
	
        return Datatables::of($data)
        ->editColumn('nama', function($data) {
            return str_ireplace("\r\n", ', ', $data->nama);
        })
        ->make(true);		
    }  
}
