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
      $laporan->status    = "on process";
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


}
