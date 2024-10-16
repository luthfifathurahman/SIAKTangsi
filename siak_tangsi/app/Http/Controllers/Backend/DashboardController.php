<?php


namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Model\Penduduk;
 
class DashboardController extends Controller {
	public function dashboard(Request $request) {
		$segment = \Request::segment(2);
        $userinfo = Session::get('userinfo');
        $access_control = Session::get('access_control');

		$total_penduduk = DB::table('tbl_penduduk')->selectRaw('count(*) as total_penduduk')->first();
		$total_keluarga = DB::table('tbl_keluarga')->selectRaw("count(*) as total_keluarga")->first();
		$total_pindah = DB::table('tbl_pindah')->selectRaw('count(*) as total_pindah')->first();
		$total_meninggal = DB::table('tbl_meninggal')->selectRaw("count(*) as total_meninggal")->first();

		$jenkel_laki    = collect(DB::SELECT("SELECT count(id) AS jumlah from tbl_penduduk where jenkel_id='1'"))->first();
		$jumlah_laki[] = $jenkel_laki ->jumlah;

		$jenkel_puan    = collect(DB::SELECT("SELECT count(id) AS jumlah from tbl_penduduk where jenkel_id='2'"))->first();
		$jumlah_puan[] = $jenkel_puan ->jumlah;
		

		return view ('backend.dashboard', [
			'userinfo' => $userinfo,
			'total_penduduk' => $total_penduduk, 
			'total_keluarga' => $total_keluarga,
			'total_pindah' => $total_pindah, 
			'total_meninggal' => $total_meninggal,
			'jumlah_laki' => $jumlah_laki,
			'jumlah_puan' => $jumlah_puan
			]);
	}
}