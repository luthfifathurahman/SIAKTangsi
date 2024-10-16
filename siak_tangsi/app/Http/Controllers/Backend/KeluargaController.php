<?php

namespace App\Http\Controllers\backend;

use Session;
use Illuminate\Http\Request;
use App\Model\Keluarga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Support\M1odel;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Validator;

class KeluargaController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('backend.keluarga.index');
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view ('backend.keluarga.update');
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
		
		$no_kk = $request->no_kk;

		$cek_no_kk = Keluarga::where('no_kk',$no_kk)->get()->count();

		if($cek_no_kk > 0){
			$validator->getMessageBag()->add('no_kk', '*) Nomor KK Sudah Pernah Digunakan');
		}else{
            $data = new Keluarga();
            $data->no_kk = $request->no_kk;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->user_modified = Session::get('userinfo')['user_id'];
            if($data->save()){
                return Redirect::to('/backend/keluarga')->with('success', "Data saved successfully")->with('mode', 'success');
            }
        }
		return Redirect::to('/backend/keluarga/tambah')
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
		$data = Keluarga::with(['user_modify'])->where('id', $id)->get();
        if ($data->count() > 0){
			return view ('backend.keluarga.view', ['data' => $data]);
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
        $data = Keluarga::where('id', $id)->get();
        if ($data->count() > 0){
			return view ('backend.keluarga.update', ['data' => $data]);
		}
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
            $data = Keluarga::find($id);
            $data->no_kk = $request->no_kk;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->user_modified = Session::get('userinfo')['user_id'];
            if($data->save()){
                return Redirect::to('/backend/keluarga/')->with('success', "Data saved successfully")->with('mode', 'success');
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
		$data = Keluarga::find($id);
		if($data->delete()){
            return Redirect::to('/backend/keluarga')->with('success', "Data Berhasil Dihapus")->with('mode', 'success');
        }
    }
	
	public function datatable() {	
		$userinfo = Session::get('userinfo');
		$data = Keluarga::where('id', '!=', 0);
	
        return Datatables::of($data)
			->addColumn('action', function ($data) {
				$userinfo = Session::get('userinfo');
				$access_control = Session::get('access_control');
				$segment =  \Request::segment(2);
				$url_edit = url('backend/keluarga/'.$data->id.'/ubah');
                $url_delete = url('backend/keluarga/hapus/'.$data->id);
				$url = url('backend/keluarga/'.$data->id);
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

	public function datatable_keluarga() {
		$data = Penduduk::select('tbl_keluarga.*')
		 ->where('tbl_keluarga.id', '!=', 0);
	
        return Datatables::of($data)
            ->make(true);		
    }
}
