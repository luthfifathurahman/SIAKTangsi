<?php

namespace App\Http\Controllers\Backend;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Penduduk;
use App\Model\Agama;


class LaporanPendudukController extends Controller
{
    //
    public function penduduk()
    {
        //
        $userinfo = Session::get('userinfo');
		$access_control = Session::get('access_control');
		$segment =  \Request::segment(2);
        

        // Agama
        $agama = DB::table('tbl_penduduk')
            ->join('ref_agama', 'tbl_penduduk.agama_id', '=', 'ref_agama.id')
            ->select('agama_id', 'ref_agama.agama as agamaa',
                        DB::raw("(count(case when jenkel_id = 1 then 2 end),0) as agama_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end),0) as agama_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end),0) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('agama_id', 'agamaa')

            ->get();


            

        // Jenis Kelamin
        $jenkel = DB::table('tbl_penduduk')
            ->join('ref_jenkel', 'tbl_penduduk.jenkel_id', '=', 'ref_jenkel.id')
            ->select('jenkel_id', 'ref_jenkel.jenkel as jenkell',
                        DB::raw("(count(case when jenkel_id = 1 then 2 end)) as jenkel_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end)) as jenkel_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end)) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('jenkel_id', 'jenkell')
            ->get();


        // Kewarganegaraan
        $kewarganegaraan  = DB::table('tbl_penduduk')
            ->join('ref_kewarganegaraan', 'tbl_penduduk.kewarganegaraan_id', '=', 'ref_kewarganegaraan.id')
            ->select('kewarganegaraan_id', 'ref_kewarganegaraan.kewarganegaraan as kewarganegaraann',
                        DB::raw("(count(case when jenkel_id = 1 then 1 end)) as kewarganegaraan_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end)) as kewarganegaraan_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end)) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('kewarganegaraan_id' , 'kewarganegaraann')
            ->get();


        // Golongan Darah
        $goldar = DB::table('tbl_penduduk')
            ->join('ref_goldar', 'tbl_penduduk.goldar_id', '=', 'ref_goldar.id')
            ->select('goldar_id', 'ref_goldar.goldar as goldarr' ,
                        DB::raw("(count(case when jenkel_id = 1 then 2 end)) as goldar_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end)) as goldar_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end)) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('goldar_id', 'goldarr')
            ->get();


        // Pendidikan
        $pendidikan = DB::table('tbl_penduduk')
            ->join('ref_pendidikan', 'tbl_penduduk.pendidikan_id', '=', 'ref_pendidikan.id')
            ->select('pendidikan_id', 'ref_pendidikan.pendidikan as pendidikann',
                        DB::raw("(count(case when jenkel_id = 1 then 2 end)) as pendidikan_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end)) as pendidikan_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end)) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('pendidikan_id', 'pendidikann')
            ->get();


        // Pendidikan
        $pekerjaan = DB::table('tbl_penduduk')
            ->join('ref_pekerjaan', 'tbl_penduduk.pekerjaan_id', '=', 'ref_pekerjaan.id')
            ->select('pekerjaan_id', 'ref_pekerjaan.pekerjaan as pekerjaann',
                        DB::raw("(count(case when jenkel_id = 1 then 2 end)) as pekerjaan_laki"), 
                        DB::raw("(count(case when jenkel_id = 1 then 3 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki"), 
                        DB::raw("(count(case when jenkel_id = 2 then 4 end)) as pekerjaan_puan"),
                        DB::raw("(count(case when jenkel_id = 2 then 5 end) *100 /(select count(*) from tbl_penduduk)) as persen_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 6 end)) as total_laki_puan"), 
                        DB::raw("(count(case when jenkel_id = 1 || jenkel_id= 2 then 7 end) *100 /(select count(*) from tbl_penduduk)) as persen_laki_puan"),
                        DB::raw("(select count(*) from tbl_penduduk) as total"),
                        DB::raw("(select count(*) from tbl_penduduk) *100 /(select count(*) from tbl_penduduk) as persen_total"),
                    )
            ->groupBy('pekerjaan_id',  'pekerjaann')
            ->get();


        return view ('backend.laporan.penduduk')
                    ->with(['penduduk' => $penduduk, 
                            'agama' => $agama,
                            'pendidikan' => $pendidikan,
                            'pekerjaan' => $pekerjaan,
                            'jenkel' => $jenkel,
                            'kewarganegaraan' => $kewarganegaraan,
                            'goldar' => $goldar]);

    }

    public function pindah()
    {
        // Pindah
        $pindah = DB::table('tbl_pindah')
            ->join('ref_jenkel', 'tbl_pindah.jenkel_id', '=', 'ref_jenkel.id')
            ->select('jenkel_id', 'ref_jenkel.jenkel as jenkell',
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2019 then 1 end)  as count19"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2020 then 1 end)  as count20"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2021 then 1 end)  as count21"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2019 then 1 end) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2019))  as persen19"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2020 then 1 end) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2020))  as persen20"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2021 then 1 end) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2021))  as persen21"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2019))  as total19"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2020))  as total20"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2021))  as total21"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2019)) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2019))  as persen_total19"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2020)) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2020))  as persen_total20"),
                        DB::raw("(select count(*) from tbl_pindah where (Year(tanggal) = 2021)) * 100 / (select count(*) from tbl_pindah where (Year(tanggal) = 2021))  as persen_total21"),
                    )
            
            ->groupBy('jenkel_id', 'jenkell')
            ->get();

        return view ('backend.laporan.pindah')
            ->with(['pindah' => $pindah]);
    }

    public function meninggal()
    {
        // Meninggal
        $meninggal = DB::table('tbl_meninggal')
            ->join('ref_jenkel', 'tbl_meninggal.jenkel_id', '=', 'ref_jenkel.id')
            ->select('jenkel_id', 'ref_jenkel.jenkel as jenkell',
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2019 then 1 end)  as count19"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2020 then 1 end)  as count20"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2021 then 1 end)  as count21"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2019 then 1 end) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2019))  as persen19"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2020 then 1 end) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2020))  as persen20"),
                        DB::raw("count(case when jenkel_id >=0 && Year(tanggal)= 2021 then 1 end) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2021))  as persen21"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2019))  as total19"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2020))  as total20"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2021))  as total21"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2019)) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2019))  as persen_total19"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2020)) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2020))  as persen_total20"),
                        DB::raw("(select count(*) from tbl_meninggal where (Year(tanggal) = 2021)) * 100 / (select count(*) from tbl_meninggal where (Year(tanggal) = 2021))  as persen_total21"),
                        
                    )
            ->groupBy('jenkel_id', 'jenkell')
            ->get();

           
        return view ('backend.laporan.meninggal')
            ->with(['meninggal' => $meninggal]);
    }


}
