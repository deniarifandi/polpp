<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Image;

class LaporanController extends Controller
{
    public function laporan_post(Request $request){


      $laporan            = new Laporan;
      $laporan->nama      = $request->input('name');
      $laporan->email     = $request->input('email');
      $laporan->nik       = $request->input('nik');
      $laporan->subjek    = $request->input('subjek');
      $laporan->pesan     = $request->input('pesan');
      $laporan->longitude = $request->input('longitude');
      $laporan->latitude  = $request->input('latitude');
      $laporan->status    = 1;
      $laporan->save();
      //print_r($laporan->id);

      //$img = Image::make($request->fotolaporan);

      // $img = Image::make($request->file('fotolaporan'))->resize(300, 200);
      // return $img->response('jpg');

      $image = $request->fotolaporan;
      $nameImage = $request->fotolaporan->getClientOriginalName();
      
      $size = Image::make($image->getRealPath())->filesize();
      //echo $size;
      if ($size > 1000000 && $size < 5000000 ) {

          $height = Image::make($image->getRealPath())->height();
          $width  = Image::make($image->getRealPath())->width();
          $thumbImage = Image::make($image->getRealPath())->resize($width/2, $height/2);
          mkdir(public_path('storage') .'/foto_laporan/'.$laporan->id, 0777, true);
          $thumbPath  = public_path('storage') .'/foto_laporan/'.$laporan->id.'/'. $nameImage; 
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

      }else if ($size >= 5000000 && $size < 10000000) {

          $height = Image::make($image->getRealPath())->height();
          $width  = Image::make($image->getRealPath())->width();
          $thumbImage = Image::make($image->getRealPath())->resize($width/4, $height/4);
          mkdir(public_path('storage') .'/foto_laporan/'.$laporan->id, 0777, true);
          $thumbPath  = public_path('storage') .'/foto_laporan/'.$laporan->id.'/'. $nameImage; 
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

      }else if ($size >= 10000000) {

          $height = Image::make($image->getRealPath())->height();
          $width  = Image::make($image->getRealPath())->width();
          $thumbImage = Image::make($image->getRealPath())->resize($width/6, $height/6);
          mkdir(public_path('storage') .'/foto_laporan/'.$laporan->id, 0777, true);
          $thumbPath  = public_path('storage') .'/foto_laporan/'.$laporan->id.'/'. $nameImage; 
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

      }else{
          $thumbImage = Image::make($image->getRealPath());
          mkdir(public_path('storage') .'/foto_laporan/'.$laporan->id, 0777, true);
          $thumbPath  = public_path('storage') . '/foto_laporan/'.$laporan->id.'/'.$nameImage; 
          $thumbImage = Image::make($thumbImage)->save($thumbPath);
          echo $thumbPath;
          echo "save not comp";
      }
      
      // 
      
       return redirect()->back()->with('success', 'berhasil');
      

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

   public function detail_print($id){
      //echo $id;

        $id_kegiatan = "0";
        $pelanggarans = DB::table('laporans')
                        ->select(
                                '*'
                        )->where('id','=',$id)->get();
        //print_r($pelanggarans);

        $file_laporan = Storage::disk('public')->allFiles("foto_laporan/".$id);

        // print_r($file_laporan);

        return view('detail_laporan_print', ['pelanggaran' => $pelanggarans, 'foto_laporan' => $file_laporan]);
   }

   public function proses_laporan($id){ 

        $laporan = Laporan::find($id);
        $laporan->status = 0;
        $laporan->save();

        return redirect()->back()->with('success', 'berhasil');
   }

   public function un_proses_laporan($id){
        $laporan = Laporan::find($id);
        $laporan->status = 1;
        $laporan->save();

        return redirect()->back()->with('success', 'berhasil');
   }

     //////////////////////////////////////////////////
    public function api_total_kegiatan($tahun){

    
        for ($x=1; $x < 13; $x++) { 
            for ($i=1; $i < 13; $i++) { 
                $bulankeg[$x][$i] = DB::table('pelanggarans')
                ->select(DB::raw('count(id) as total'))
                ->where(DB::raw('MONTH(tgl_peristiwa)'), "=", $i)
                ->where('id_kegiatan','=',$x)
                ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                ->get();       
            }
        }
        
        
        // echo $bulan[0]->total;

        echo '[{
                    "name": "Reklame",
                    "data":  ['  .$bulankeg[1][1][0]->total.",".$bulankeg[1][2][0]->total.",".$bulankeg[1][3][0]->total.","
                                .$bulankeg[1][4][0]->total.",".$bulankeg[1][5][0]->total.",".$bulankeg[1][6][0]->total.","
                                .$bulankeg[1][7][0]->total.",".$bulankeg[1][8][0]->total.",".$bulankeg[1][9][0]->total.","
                                .$bulankeg[1][10][0]->total.",".$bulankeg[1][11][0]->total.",".$bulankeg[1][12][0]->total.
                            ']

                },{
                    "name": "PKL",
                    "data": ['  .$bulankeg[2][1][0]->total.",".$bulankeg[2][2][0]->total.",".$bulankeg[2][3][0]->total.","
                                .$bulankeg[2][4][0]->total.",".$bulankeg[2][5][0]->total.",".$bulankeg[2][6][0]->total.","
                                .$bulankeg[2][7][0]->total.",".$bulankeg[2][8][0]->total.",".$bulankeg[2][9][0]->total.","
                                .$bulankeg[2][10][0]->total.",".$bulankeg[2][11][0]->total.",".$bulankeg[2][12][0]->total.
                            ']

                },
                {
                    "name": "AnJal-GePeng",
                    "data": ['  .$bulankeg[3][1][0]->total.",".$bulankeg[3][2][0]->total.",".$bulankeg[3][3][0]->total.","
                                .$bulankeg[3][4][0]->total.",".$bulankeg[3][5][0]->total.",".$bulankeg[3][6][0]->total.","
                                .$bulankeg[3][7][0]->total.",".$bulankeg[3][8][0]->total.",".$bulankeg[3][9][0]->total.","
                                .$bulankeg[3][10][0]->total.",".$bulankeg[3][11][0]->total.",".$bulankeg[3][12][0]->total.
                            ']

                },{
                    "name": "PSK",
                    "data": ['  .$bulankeg[4][1][0]->total.",".$bulankeg[4][2][0]->total.",".$bulankeg[4][3][0]->total.","
                                .$bulankeg[4][4][0]->total.",".$bulankeg[4][5][0]->total.",".$bulankeg[4][6][0]->total.","
                                .$bulankeg[4][7][0]->total.",".$bulankeg[4][8][0]->total.",".$bulankeg[4][9][0]->total.","
                                .$bulankeg[4][10][0]->total.",".$bulankeg[4][11][0]->total.",".$bulankeg[4][12][0]->total.
                            ']

                },{
                    "name": "Minol",
                    "data": ['  .$bulankeg[5][1][0]->total.",".$bulankeg[5][2][0]->total.",".$bulankeg[5][3][0]->total.","
                                .$bulankeg[5][4][0]->total.",".$bulankeg[5][5][0]->total.",".$bulankeg[5][6][0]->total.","
                                .$bulankeg[5][7][0]->total.",".$bulankeg[5][8][0]->total.",".$bulankeg[5][9][0]->total.","
                                .$bulankeg[5][10][0]->total.",".$bulankeg[5][11][0]->total.",".$bulankeg[5][12][0]->total.
                            ']

                },
                {
                    "name": "Pemondokan",
                    "data": ['  .$bulankeg[6][1][0]->total.",".$bulankeg[6][2][0]->total.",".$bulankeg[6][3][0]->total.","
                                .$bulankeg[6][4][0]->total.",".$bulankeg[6][5][0]->total.",".$bulankeg[6][6][0]->total.","
                                .$bulankeg[6][7][0]->total.",".$bulankeg[6][8][0]->total.",".$bulankeg[6][9][0]->total.","
                                .$bulankeg[6][10][0]->total.",".$bulankeg[6][11][0]->total.",".$bulankeg[6][12][0]->total.
                            ']

                },{
                    "name": "Parkir Liar",
                    "data": ['  .$bulankeg[7][1][0]->total.",".$bulankeg[7][2][0]->total.",".$bulankeg[7][3][0]->total.","
                                .$bulankeg[7][4][0]->total.",".$bulankeg[7][5][0]->total.",".$bulankeg[7][6][0]->total.","
                                .$bulankeg[7][7][0]->total.",".$bulankeg[7][8][0]->total.",".$bulankeg[7][9][0]->total.","
                                .$bulankeg[7][10][0]->total.",".$bulankeg[7][11][0]->total.",".$bulankeg[7][12][0]->total.
                            ']

                },{
                    "name": "Prokes",
                    "data": ['  .$bulankeg[8][1][0]->total.",".$bulankeg[8][2][0]->total.",".$bulankeg[8][3][0]->total.","
                                .$bulankeg[8][4][0]->total.",".$bulankeg[8][5][0]->total.",".$bulankeg[8][6][0]->total.","
                                .$bulankeg[8][7][0]->total.",".$bulankeg[8][8][0]->total.",".$bulankeg[8][9][0]->total.","
                                .$bulankeg[8][10][0]->total.",".$bulankeg[8][11][0]->total.",".$bulankeg[8][12][0]->total.
                            ']

                }]';
        

    }

    public function api_jenis_penertiban($tahun){

        $pelanggaran = DB::table('pelanggarans')
                ->select(DB::raw('count(id_kegiatan) as data'), 'kegiatans.nama as name')
                ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                ->join('kegiatans', 'pelanggarans.id_kegiatan', '=','kegiatans.id')
                ->groupBy('kegiatans.nama')
                ->orderBy('kegiatans.id')
                ->get();       

        echo $pelanggaran;

    }

    public function api_lokasi_pelanggaran($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

    public function api_jenis_reklame($tahun){

        $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_reklames.nama as name',DB::raw('count(jenis_reklames.nama) as data'))
                    ->join('jenis_reklames','jenis_reklames.id','=','pelanggarans.id_jenis_reklame')
                    ->where('id_kegiatan','=',1)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_reklames.nama')
                    ->orderBy('jenis_reklames.id')
                    ->get();

        echo $pelanggaran;
    }

     public function api_lokasi_pelanggaran_reklame($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',1)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

    public function api_jenis_pelanggaran_reklame($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_pelanggarans.nama as name',DB::raw('count(jenis_pelanggarans.nama) as data'))
                    ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran')
                    ->where('id_kegiatan','=',1)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_pelanggarans.nama')
                    ->orderBy('jenis_pelanggarans.id')
                    ->get();

        echo $pelanggaran;

    }

    public function api_jenis_tindak_lanjut_reklame($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',1)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }


    /////////////

    public function api_jenis_pkl($tahun){

        $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_pkls.nama as name',DB::raw('count(jenis_pkls.nama) as data'))
                    ->join('jenis_pkls','jenis_pkls.id','=','pelanggarans.id_jenis_pkl')
                    ->where('id_kegiatan','=',2)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_pkls.nama')
                    ->orderBy('jenis_pkls.id')
                    ->get();

        echo $pelanggaran;
    }


     public function api_lokasi_pelanggaran_pkl($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',2)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_pelanggaran_pkl($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_pelanggarans.nama as name',DB::raw('count(jenis_pelanggarans.nama) as data'))
                    ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran')
                    ->where('id_kegiatan','=',2)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_pelanggarans.nama')
                    ->orderBy('jenis_pelanggarans.id')
                    ->get();

        echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_pkl($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',2)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }


     /////////////

    public function api_jenis_anjal($tahun){

        $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_anjal_gepengs.nama as name',DB::raw('count(jenis_anjal_gepengs.nama) as data'))
                    ->join('jenis_anjal_gepengs','jenis_anjal_gepengs.id','=','pelanggarans.id_jenis_anjal_gepeng')
                    ->where('id_kegiatan','=',3)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_anjal_gepengs.nama')
                    ->orderBy('jenis_anjal_gepengs.id')
                    ->get();

        echo $pelanggaran;
    }


     public function api_lokasi_pelanggaran_anjal($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',3)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_pelanggaran_anjal($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('jenis_pelanggarans.nama as name',DB::raw('count(jenis_pelanggarans.nama) as data'))
                    ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran')
                    ->where('id_kegiatan','=',3)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('jenis_pelanggarans.nama')
                    ->orderBy('jenis_pelanggarans.id')
                    ->get();

        echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_anjal($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',3)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }


    public function api_lokasi_pelanggaran_psk($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',4)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_psk($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',4)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }

     public function api_lokasi_pelanggaran_minol($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',5)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_minol($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',5)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }


      public function api_lokasi_pelanggaran_pemondokan($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',6)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_pemondokan($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',6)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }


     public function api_lokasi_pelanggaran_parkir($tahun){

        $pelanggaran = DB::table('kecamatans')
                    ->select('kecamatans.nama as name',DB::raw('count(id_kecamatan) as y'))
                    ->join('pelanggarans','pelanggarans.id_kecamatan','=','kecamatans.id','left')
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->where('pelanggarans.id_kegiatan','=',7)
                    ->groupBy('nama')
                    ->orderBy('kecamatans.id')
                    ->get();

         echo $pelanggaran;

    }

      public function api_jenis_tindak_lanjut_parkir($tahun){

              $pelanggaran = DB::table('pelanggarans')
                    ->select('tindak_lanjuts.nama as name',DB::raw('count(tindak_lanjuts.nama) as data'))
                    ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut')
                    ->where('id_kegiatan','=',7)
                    ->where(DB::raw('YEAR(tgl_peristiwa)'), "=", $tahun)
                    ->groupBy('tindak_lanjuts.nama')
                    ->orderBy('tindak_lanjuts.id')
                    ->get();

        echo $pelanggaran;

    }

}
