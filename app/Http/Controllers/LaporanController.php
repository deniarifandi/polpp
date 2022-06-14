<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaporanController extends Controller
{
    public function laporan_post(Request $request){

    	DB::table('laporans')->insert([
		    'nama' 		=> $request->input('nama'),
		    'email' 	=> $request->input('email'),
		    'subjek'	=> $request->input('subjek'),
		    'pesan'		=> $request->input('pesan'),
		    'longitude'	=> $request->input('longitude'),
		    'latitude'	=> $request->input('latitude')
		]);
    }
}
