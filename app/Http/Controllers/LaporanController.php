<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class LaporanController extends Controller
{
    public function laporan_post(Request $request){

  //   	$laporan = DB::table('laporans')->insert([
		//     'nama' 		   => $request->input('name'),
		//     'email' 	   => $request->input('email'),
		//     'nik'		     => $request->input('nik'),
		//     'subjek'	   => $request->input('subjek'),
		//     'pesan'		   => $request->input('pesan'),
		//     'longitude'	 => $request->input('longitude'),
		//     'latitude'	 => $request->input('latitude')

		// ]);

      $laporan            = new Laporan;
      $laporan->nama      = $request->input('name');
      $laporan->email     = $request->input('email');
      $laporan->nik       = $request->input('nik');
      $laporan->subjek    = $request->input('subjek');
      $laporan->pesan     = $request->input('pesan');
      $laporan->longitude = $request->input('longitude');
      $laporan->latitude  = $request->input('latitude');
      $laporan->save();
      print_r($laporan->id);

    //   $disk = Storage::build([
    //     'driver' => 'local',
    //     'root' => storage_path('app/public'),
    // ]);
      
      // $path = Storage::putFile('avatars', $request->file('foto'));
      // echo $path;

      Storage::disk('public')->put("foto_laporan/".$laporan->id, $request->fotolaporan);

		// return redirect('/');
    }
   

   public function index(Request $request){

        $id_kegiatan = "0";
        $pelanggarans = DB::table('laporans')
                        ->select(
                                '*'
                        );
        return view('list_laporan', ['pelanggarans' => $pelanggarans->paginate(10)]);
   }

   public function detail($id){
   		//echo $id;

        $id_kegiatan = "0";
        $pelanggarans = DB::table('laporans')
                        ->select(
                                '*'
                        )->where('id','=',$id)->get();
        //print_r($pelanggarans);

        $file_laporan = Storage::disk('public')->allFiles("foto_laporan/".$id);

        // print_r($file_laporan);

        return view('detail_laporan', ['pelanggaran' => $pelanggarans, 'foto_laporan' => $file_laporan]);
   }


}
