<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
   	

   	public static function get_label_chart(){

   		$data = "[";
		$kegiatans = DB::table('kegiatans')->get('nama');
		
			for ($i=0; $i < count($kegiatans); $i++) { 
				if ($i != count($kegiatans)-1) {
					$data = $data." '".$kegiatans[$i]->nama."', ";
				}else{
					$data = $data." '".$kegiatans[$i]->nama."' ";
				}
				
			}
		$data = $data."]";
		// echo $data;

		return $data;

   	}

   	public static function get_pelanggaran_value(){

   	}

   	public static function get_all_chart(){

   		$data = DB::table('pelanggarans')
   				->select(DB::raw('COUNT(kegiatans.nama) as total'), 'kegiatans.nama')
   				->join('kegiatans','pelanggarans.id_kegiatan','=','kegiatans.id')
   				->groupBy('kegiatans.nama')
   				->orderBy('kegiatans.id')
   				->get();
   		
   		return $data;

   	}

   	public static function get_kecamatan_chart(){

   		$data = DB::table('pelanggarans')
   				->select(DB::raw('COUNT(kecamatans.nama) as total'), 'kecamatans.nama')
   				->join('kecamatans','pelanggarans.id_kecamatan','=','kecamatans.id')
   				->groupBy('kecamatans.nama')
   				->orderBy('kecamatans.id')
   				->get();
   		
   		return $data;

   	}
}
