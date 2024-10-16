<?php

namespace App\Http\Controllers\backend;

use Session;
use Illuminate\Http\Request;
use App\Model\Penduduk;
use App\Model\Agama;
use App\Model\Kewarganegaraan;
use App\Model\JenisKelamin;
use App\Model\Pekerjaan;
use App\Model\Pendidikan;
use App\Model\GolDar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Support\Model;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Validator;

class PendudukController extends Controller
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

        $penduduk = DB::table('tbl_penduduk')->get();
        $segment = \Request::segment(2);
        $userinfo = Session::get('userinfo');
        $access_control = Session::get('access_control');

        if (!empty($access_control)){
            if ($access_control[$userinfo['user_level_id']][$segment] !="n") {
                return view ('backend.penduduk.index')->with(['penduduk' => $penduduk]);
            } else{
                return view ('');
            }
        }
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agama = Agama::pluck('agama','id');
        $kewarganegaraan = Kewarganegaraan::pluck('kewarganegaraan','id');
        $pendidikan = Pendidikan::pluck('pendidikan','id');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id');
        $goldar = GolDar::pluck('goldar','id');
        $jenkel = JenisKelamin::pluck('jenkel','id');

		return view ('backend.penduduk.update',
        [
            'agama' => $agama,
            'kewarganegaraan' => $kewarganegaraan,
            'jenkel' => $jenkel,
            'goldar' => $goldar,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan
        ]);
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

		$ceknik = Penduduk::where('nik',$nik)->get()->count();

		if($ceknik > 0){
			$validator->getMessageBag()->add('nik', '*) NIK Sudah Pernah Digunakan');
		}else{
            $data = new Penduduk();
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->tempat = $request->tempat;
            $data->tgl_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
            $data->jenkel_id = $request->jenkel_id;
            $data->agama_id = $request->agama_id;
            $data->kewarganegaraan_id = $request->kewarganegaraan_id;
            $data->goldar_id = $request->goldar_id;
            $data->pendidikan_id = $request->pendidikan_id;
            $data->pekerjaan_id = $request->pekerjaan_id;
            $data->user_modified = Session::get('userinfo')['user_id'];
			

            
			if($data->save()){
				return Redirect::to('/backend/penduduk/')->with('success', "Data saved successfully")->with('mode', 'success');
			}
		}
		return Redirect::to('/backend/penduduk/tambah')
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
        $agama = Agama::pluck('agama','id');
        $kewarganegaraan = Kewarganegaraan::pluck('kewarganegaraan','id');
        $pendidikan = Pendidikan::pluck('pendidikan','id');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id');
        $goldar = GolDar::pluck('goldar','id');
        $jenkel = JenisKelamin::pluck('jenkel','id');

		$data = Penduduk::with(['user_modify'])->where('id', $id)->get();
		
        if ($data->count() > 0){
			return view ('backend.penduduk.view', ['data' => $data]);
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
        $agama = Agama::pluck('agama','id');
        $kewarganegaraan = Kewarganegaraan::pluck('kewarganegaraan','id');
        $pendidikan = Pendidikan::pluck('pendidikan','id');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id');
        $goldar = GolDar::pluck('goldar','id');
        $jenkel = JenisKelamin::pluck('jenkel','id');
        $data = Penduduk::where('id', $id)->get();

        return view ('backend.penduduk.update', [
                'agama' => $agama,
                'kewarganegaraan' => $kewarganegaraan,
                'jenkel' => $jenkel,
                'goldar' => $goldar,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
                'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $data = Penduduk::find($id);
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->tempat = $request->tempat;
            $data->tgl_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
            $data->jenkel_id = $request->jenkel_id;
            $data->agama_id = $request->agama_id;
            $data->kewarganegaraan_id = $request->kewarganegaraan_id;
            $data->goldar_id = $request->goldar_id;
            $data->pendidikan_id = $request->pendidikan_id;
            $data->pekerjaan_id = $request->pekerjaan_id;
            $data->user_modified = Session::get('userinfo')['user_id'];
			
			if($data->save()){
				return Redirect::to('/backend/penduduk/')->with('success', "Data Berhasil Diubah")->with('mode', 'success');
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
		$data = Penduduk::find($id);
		if($data->delete()){
            return Redirect::to('/backend/penduduk')->with('success', "Data Berhasil Dihapus")->with('mode', 'success');
        }
    }
	
	public function datatable() {	
		$userinfo = Session::get('userinfo');
		$data = Penduduk::where('id', '!=', 0);
	
        return Datatables::of($data)
			->addColumn('action', function ($data) {
				$userinfo = Session::get('userinfo');
				$access_control = Session::get('access_control');
				$segment =  \Request::segment(2);
				$url_edit = url('backend/penduduk/'.$data->id.'/ubah');
                $url_delete = url('backend/penduduk/hapus/'.$data->id);
				$url = url('backend/penduduk/'.$data->id);
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
            ->editColumn('tgl_lahir', function ($data) {
                return date('d-m-Y', strtotime($data->tgl_lahir));
            })
            ->make(true);		
	}

	public function datatable_penduduk() {
		$data = Penduduk::select('tbl_penduduk.*')
		 ->where('tbl_penduduk.id', '!=', 0);
	
        return Datatables::of($data)
        ->editColumn('nama', function($data) {
            return str_ireplace("\r\n", ', ', $data->nama);
        })
        ->make(true);		
    }                 
}
