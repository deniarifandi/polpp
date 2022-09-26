<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Regu;
use App\Models\Kegiatan;
use App\Models\Vendor;
use App\Models\Jenis_reklame;
use App\Models\Jenis_pelanggaran;
use App\Models\Tindak_lanjut;
use App\Models\Ukuran_reklame;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Jenis_pkl;
use App\Models\Jenis_anjal_gepeng;
use App\Models\Jenis_penertiban_prokes;
use App\Models\Administration;
use DB;
use Image;

use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Filesystem\Filesystem;
use File;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Contracts\Support\Jsonable;

use Exception;
use Redirect;


class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       
    }

    public function index()
    {

        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
        }

        $id_kegiatan = "0";
        $pelanggarans = DB::table('pelanggarans')
                        ->select(
                                'pelanggarans.id',
                                'pelanggarans.created_at',
                                'pelanggarans.pkl_nama',
                                'pelanggarans.pkl_no_identitas',
                                'pelanggarans.alamat',
                                'pelanggarans.tema_reklame',
                                'vendors.nama as nama_vendor',
                                'regus.nama as nama_regu',
                                'kegiatans.nama as nama_kegiatan',
                                'jenis_pelanggarans.nama as nama_pelanggaran',
                                'tindak_lanjuts.nama as nama_tindak_lanjut',
                                'tgl_peristiwa',
                                'jenis_pkls.nama as jenis_pkl',
                                'jenis_reklames.nama as jenis_reklame',
                                'jenis_anjal_gepengs.nama as jenis_anjal',
                                'pelanggarans.anjal_gepeng_nama',
                                'pelanggarans.anjal_gepeng_no_identitas',
                                'pelanggarans.psk_nama',
                                'pelanggarans.psk_no_identitas',
                                'pelanggarans.minol_nama',
                                'pelanggarans.minol_no_identitas',
                                'pelanggarans.psk_kelamin',
                                'pelanggarans.pemondokan_no_identitas',
                                'pelanggarans.pemondokan_nama',
                                'pelanggarans.parkir_nama',
                                'pelanggarans.parkir_no_identitas',
                                'pelanggarans.prokes_nama',
                                'pelanggarans.prokes_no_identitas'
                                
                        );
                        $pelanggarans = $pelanggarans->join('regus','regus.id', '=','pelanggarans.id_regu', 'left');
                        $pelanggarans = $pelanggarans->join('jenis_pkls','pelanggarans.id_jenis_pkl','=','jenis_pkls.id','left');
                        $pelanggarans = $pelanggarans->join('kegiatans','kegiatans.id', '=','pelanggarans.id_kegiatan','left');
                        $pelanggarans = $pelanggarans->join('jenis_pelanggarans','jenis_pelanggarans.id', '=','pelanggarans.id_jenis_pelanggaran','left');
                        $pelanggarans = $pelanggarans->join('jenis_reklames','pelanggarans.id_jenis_reklame','=','jenis_reklames.id','left');
                        $pelanggarans = $pelanggarans->join('vendors','pelanggarans.id_pemilik','=','vendors.id','left');
                        $pelanggarans = $pelanggarans->join('tindak_lanjuts','tindak_lanjuts.id', '=','pelanggarans.id_tindak_lanjut','left');
                        $pelanggarans = $pelanggarans->join('jenis_anjal_gepengs','jenis_anjal_gepengs.id', '=','pelanggarans.id_jenis_anjal_gepeng','left');

                        if (@isset($cari)) {
                            $pelanggarans = $pelanggarans->where('tema_reklame','LIKE','%'.$cari.'%');
                            $pelanggarans = $pelanggarans->orwhere('pkl_nama','LIKE','%'.$cari.'%');
                            $pelanggarans = $pelanggarans->orwhere('anjal_gepeng_nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('pelanggarans.pkl_nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('pelanggarans.pkl_no_identitas','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('pelanggarans.alamat','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('pelanggarans.tema_reklame','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('vendors.nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('regus.nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('kegiatans.nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('jenis_pelanggarans.nama','LIKE','%'.$cari.'%');
                                $pelanggarans = $pelanggarans->orwhere('tindak_lanjuts.nama','LIKE','%'.$cari.'%');
                       
                                $pelanggarans = $pelanggarans->orwhere('jenis_pkls.nama','LIKE','%'.$cari.'%');
                              
                        }

                        $pelanggarans = $pelanggarans->orderBy('id','desc');


        if (isset($_GET['id_kegiatan'])) {

             $pelanggarans = $pelanggarans->where('id_kegiatan',$_GET['id_kegiatan']);
             $id_kegiatan = $_GET['id_kegiatan'];
        }
        
        return view('list_pelanggaran', ['pelanggarans' => $pelanggarans->paginate(10), 'id_kegiatan' => $id_kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (isset($_GET['id_kegiatan'])) {
               $Jenis_pelanggarans = Jenis_pelanggaran::select('*')->where('kategori','=',$_GET['id_kegiatan'])->orderBy('nama')->get();
        }

        $regus              = Regu::select('*')->where('keterangan','=','1')->get();
        $kegiatans          = Kegiatan::select('*')->get();
        $vendors            = Vendor::select('*')->orderBy('nama')->get();
        $jenis_reklames     = Jenis_reklame::select('*')->orderBy('nama')->get();
        $tindak_lanjuts     = Tindak_lanjut::select('*')->orderBy('nama')->get();
        $ukuran_reklames    = Ukuran_reklame::select('*')->orderBy('nama')->get();
        $kecamatans         = Kecamatan::select('*')->orderBy('nama')->get();
        $kelurahans         = Kelurahan::select('*')->orderBy('nama')->get();
        $jenis_pkls         = Jenis_pkl::select('*')->orderBy('nama')->get();
        $jenis_anjal_gepeng = Jenis_anjal_gepeng::select('*')->orderBy('nama')->get();
        $jenis_penertiban_prokes    =   Jenis_penertiban_prokes::select('*')->orderBy('nama')->get();


        return view('insert_pelanggaran',[
            'regus'             => $regus, 
            'kegiatans'         => $kegiatans, 
            'vendors'           => $vendors,
            'jenis_reklames'    => $jenis_reklames,
            'jenis_pelanggarans'=> $Jenis_pelanggarans,
            'tindak_lanjuts'    => $tindak_lanjuts,
            'ukuran_reklames'   => $ukuran_reklames,
            'kecamatans'        => $kecamatans,
            'kelurahans'        => $kelurahans,
            'jenis_pkls'        => $jenis_pkls,
            'jenis_anjal_gepengs'=> $jenis_anjal_gepeng,
            'jenis_penertiban_prokess'   => $jenis_penertiban_prokes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelanggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelanggaranRequest $request)
    {
       
        try{
            if ($request->id != null) {
                $pelanggaran = pelanggaran::find($request->id);
            }
            else{
                $pelanggaran                    = new Pelanggaran;    
            }

            

            //detail laporan
            $pelanggaran->id_jenis_laporan  = 1;
            
            $pelanggaran->tgl_peristiwa     = date_format(date_create($request->tgl_peristiwa),"Y-m-d");
            $pelanggaran->id_kegiatan       = $request->id_kegiatan;

            //detail pelanggaran reklame
            $pelanggaran->tema_reklame      = $request->tema_reklame;
            // $pelanggaran->id_pemilik        = $request->id_pemilik;
            //$pelanggaran->id_jenis_reklame  = $request->id_jenis_reklame;
            //$pelanggaran->id_ukuran_reklame = $request->id_ukuran_reklame;
            $pelanggaran->jumlah_reklame    = $request->jumlah_reklame;

            //detail pkl
            //$pelanggaran->id_jenis_pkl      = $request->id_jenis_pkl;
            $pelanggaran->pkl_nama          = $request->pkl_nama;
            $pelanggaran->pkl_no_identitas  = $request->pkl_no_identitas;
            $pelanggaran->pkl_alamat        = $request->pkl_alamat;

            //detail anjalgepeng
            //$pelanggaran->id_jenis_anjal_gepeng      = $request->id_jenis_anjal_gepeng;
            $pelanggaran->anjal_gepeng_nama          = $request->anjal_gepeng_nama;
            $pelanggaran->anjal_gepeng_no_identitas  = $request->anjal_gepeng_no_identitas;

            //detail PSK

             //detail parkir
            $pelanggaran->parkir_nama          = $request->parkir_nama;
            $pelanggaran->parkir_no_identitas  = $request->parkir_no_identitas;  

            //prokes
           
            $pelanggaran->id_jenis_pelaku_usaha = $request->id_jenis_pelaku_usaha;
           
          

            if ($request->id_kegiatan == 5) {
                //detail minol
                $pelanggaran->minol_nama          = $request->minol_nama;
                $pelanggaran->minol_no_identitas  = $request->minol_no_identitas;
                $pelanggaran->psk_nama          = $request->minol_barang_bukti;
                $pelanggaran->psk_no_identitas  = $request->minol_jml_barang_bukti;            
                $pelanggaran->psk_kelamin       = $request->minol_golongan;
                $pelanggaran->pemondokan_no_identitas = $request->minol_no_ijin;
            }else if($request->id_kegiatan == 4){
                $pelanggaran->psk_nama          = $request->psk_nama;
                $pelanggaran->psk_no_identitas  = $request->psk_no_identitas;            
                $pelanggaran->psk_kelamin       = $request->psk_kelamin;
                $pelanggaran->minol_nama        = $request->psk_barang_bukti;
                $pelanggaran->minol_no_identitas= $request->psk_jml_barang_bukti;    
            }else if ($request->id_kegiatan == 6){
                //detail pemondokan
                $pelanggaran->pemondokan_nama          = $request->pemondokan_nama;
                $pelanggaran->pemondokan_no_identitas  = $request->pemondokan_no_identitas;            
            }else if($request->id_kegiatan == 8){
                $pelanggaran->prokes_nama           = $request->prokes_nama;
                $pelanggaran->prokes_no_identitas   = $request->prokes_no_identitas;
                $pelanggaran->parkir_nama           = $request->nomor_surat;
                $pelanggaran->parkir_no_identitas   = $request->pelaku_usaha_nama;

            }

            


            //pelanggaran & tindak lanjut
           // $pelanggaran->id_jenis_pelanggaran  = $request->id_jenis_pelanggaran;
            //$pelanggaran->id_tindak_lanjut      = $request->id_tindak_lanjut;

            //lokasi keterangan
            $pelanggaran->id_kecamatan  = $request->id_kecamatan;
            $pelanggaran->id_kelurahan  = $request->id_kelurahan;
            $pelanggaran->alamat        = $request->alamat;
            $pelanggaran->lat           = $request->lat;
            $pelanggaran->lon           = $request->lon;


            

            if ($request->id_regu == "tambahvalue") {
                $regu = new Regu;
                $regu->nama = $request->input_tambah_regu;
                $regu->keterangan = 1;
                $regu->save();
                $pelanggaran->id_regu = $regu->id;
            }else{
                $pelanggaran->id_regu   = $request->id_regu;    
            }

            if ($request->id_pemilik == "tambahvalue") {
                $pemilik = new Vendor;
                $pemilik->nama = $request->input_tambah_pemilik;
                $pemilik->save();
                $pelanggaran->id_pemilik = $pemilik->id;
            }else{
                $pelanggaran->id_pemilik   = $request->id_pemilik;    
            }

            if ($request->id_jenis_reklame == "tambahvalue") {
                $jenisReklame = new Jenis_reklame;
                $jenisReklame->nama = $request->input_tambah_jenis_reklame;
                $jenisReklame->save();
                $pelanggaran->id_jenis_reklame = $jenisReklame->id;
            }else{
                $pelanggaran->id_jenis_reklame   = $request->id_jenis_reklame;    
            }

            if ($request->id_ukuran_reklame == "tambahvalue") {
                $ukuranReklame = new Ukuran_reklame;
                $ukuranReklame->nama = $request->input_tambah_ukuran_reklame;
                $ukuranReklame->save();
                $pelanggaran->id_ukuran_reklame = $ukuranReklame->id;
            }else{
                $pelanggaran->id_ukuran_reklame   = $request->id_ukuran_reklame;    
            }


            if ($request->id_jenis_pkl == "tambahvalue") {
                $jenisPkl = new Jenis_pkl;
                $jenisPkl->nama = $request->input_tambah_jenis_pkl;
                $jenisPkl->save();
                $pelanggaran->id_jenis_pkl = $jenisPkl->id;
            }else{
                $pelanggaran->id_jenis_pkl      = $request->id_jenis_pkl;
            }


            if ($request->id_jenis_pelanggaran == "tambahvalue") {
                $jenisPelanggaran = new Jenis_pelanggaran;
                $jenisPelanggaran->nama = $request->input_tambah_jenis_pelanggaran;
                $jenisPelanggaran->kategori = $request->id_kegiatan;
                $jenisPelanggaran->save();
                $pelanggaran->id_jenis_pelanggaran = $jenisPelanggaran->id;
            }else{

                if (isset($request->jenis_pelanggaran)) {
                    $pelanggaran->id_jenis_pelanggaran = implode("-", $request->jenis_pelanggaran);
                }else{
                    $pelanggaran->id_jenis_pelanggaran = null;
                }
                
                
            }
            
            if ($request->id_tindak_lanjut == "tambahvalue") {
                $tindakLanjut = new Tindak_lanjut;
                $tindakLanjut->nama = $request->input_tambah_tindak_lanjut;
                $tindakLanjut->save();
                $pelanggaran->id_tindak_lanjut = $tindakLanjut->id;
            }else{
                $pelanggaran->id_tindak_lanjut      = $request->id_tindak_lanjut;
            }

            if($request->id_jenis_anjal_gepeng == "tambahvalue"){
                $jenisAnjalGepeng = new Jenis_anjal_gepeng;
                $jenisAnjalGepeng->nama = $request->input_tambah_jenis_anjal;
                $jenisAnjalGepeng->save();
                $pelanggaran->id_jenis_anjal_gepeng = $jenisAnjalGepeng->id;

            }else{
                $pelanggaran->id_jenis_anjal_gepeng = $request->id_jenis_anjal_gepeng;                
            }

            if ($request->id_jenis_penertiban_prokes == "tambahvalue") {
                $jenisPenertibanProkes = new Jenis_penertiban_prokes;
                $jenisPenertibanProkes->nama = $request->input_tambah_jenis_penertiban_prokes;
                $jenisPenertibanProkes->save();
                $pelanggaran->id_jenis_penertiban_prokes = $jenisPenertibanProkes->id;
            }else{
                 $pelanggaran->id_jenis_penertiban_prokes    =    $request->id_jenis_penertiban_prokes;
            }



            $pelanggaran->save();



            try{
                if (isset($request->foto_lokasi)) {

                   // Storage::disk('public')->put("foto_lokasi/".$pelanggaran->id, $request->foto_lokasi);    

                      $image = $request->foto_lokasi;
                      $nameImage = $request->foto_lokasi->getClientOriginalName();
                      
                      $size = Image::make($image->getRealPath())->filesize();
                      //echo $size;
                      echo "try remove 0";
                      if ($size > 1000000 && $size < 5000000 ) {

                          $height = Image::make($image->getRealPath())->height();
                          $width  = Image::make($image->getRealPath())->width();
                          $thumbImage = Image::make($image->getRealPath())->resize($width/2, $height/2);

                            try{
                                echo "try remove 2";
                                echo "path = ".public_path('storage') .'/foto_lokasi/'.$pelanggaran->id;

                                File::deleteDirectory(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id);
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }catch(Exception $e){
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }

                          $thumbPath  = public_path('storage') .'/foto_lokasi/'.$pelanggaran->id.'/'. $nameImage; 
                          $thumbImage = Image::make($thumbImage)->save($thumbPath);

                      }else if ($size >= 5000000 && $size < 10000000) {

                          $height = Image::make($image->getRealPath())->height();
                          $width  = Image::make($image->getRealPath())->width();
                          $thumbImage = Image::make($image->getRealPath())->resize($width/4, $height/4);
                          
                            try{
                                echo "try remove 2";
                                echo "path = ".public_path('storage') .'/foto_lokasi/'.$pelanggaran->id;

                                File::deleteDirectory(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id);
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }catch(Exception $e){
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }

                          $thumbPath  = public_path('storage') .'/foto_lokasi/'.$pelanggaran->id.'/'. $nameImage; 
                          $thumbImage = Image::make($thumbImage)->save($thumbPath);

                      }else if ($size >= 10000000) {

                          $height = Image::make($image->getRealPath())->height();
                          $width  = Image::make($image->getRealPath())->width();
                          $thumbImage = Image::make($image->getRealPath())->resize($width/6, $height/6);
                         
                            try{
                                echo "try remove 2";
                                echo "path = ".public_path('storage') .'/foto_lokasi/'.$pelanggaran->id;

                                File::deleteDirectory(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id);
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }catch(Exception $e){
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }

                          $thumbPath  = public_path('storage') .'/foto_lokasi/'.$pelanggaran->id.'/'. $nameImage; 
                          $thumbImage = Image::make($thumbImage)->save($thumbPath);

                      }else{
                          $thumbImage = Image::make($image->getRealPath());
                          

                            try{
                                echo "try remove 2";
                                echo "path = ".public_path('storage') .'/foto_lokasi/'.$pelanggaran->id;

                                File::deleteDirectory(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id);
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }catch(Exception $e){
                                mkdir(public_path('storage') .'/foto_lokasi/'.$pelanggaran->id, 0777, true);
                            }


                          $thumbPath  = public_path('storage') . '/foto_lokasi/'.$pelanggaran->id.'/'.$nameImage; 
                          $thumbImage = Image::make($thumbImage)->save($thumbPath);
                         
                      }  

                }
            
            }catch(\Exception $e){
                return $e->getMessage();
            }

            // return redirect('/pelanggaran?id_kegiatan='.$request->id_kegiatan)->with(['success' => 'berhasil']); OLD
                return redirect('/pelanggaran/'.$pelanggaran->id)->with(['success' => "berhasil tambah data "]);;

        }catch(Exception $e){
            return Redirect::back()->with(['error' => $e->getMessage()]);
        }

    }


    public function upload_image(request $request){

            // print_r($request->all());
        $errorMessage = null;

        try{
            for ($i=0; $i < 5; $i++) { 
                if (isset($request->id)) {
                    if (isset($request->foto_sebelum_[$i])) {

                        Storage::disk('public')->put("dokumentasi_foto_sebelum/".$request->id, $request->foto_sebelum_[$i]);

                    }

                    if (isset($request->foto_proses_[$i])) {

                        Storage::disk('public')->put("dokumentasi_foto_proses/".$request->id, $request->foto_proses_[$i]);

                    }

                    if (isset($request->foto_setelah_[$i])) {

                        Storage::disk('public')->put("dokumentasi_foto_setelah/".$request->id, $request->foto_setelah_[$i]);

                    }
                }
            }
            return Redirect::back()->with(['success' => "berhasil input foto "]);
        }catch(Exception $e){
            $errorMessage = $e;
            return Redirect::back()->with(['error' => $e->getMessage()]);
        }

    }


    public function getfile(){

        
        $files = Storage::disk('public')->allFiles("dokumentasi_foto_sebelum/1");
        
        echo $files[0];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $filesSebelum = Storage::disk('public')->allFiles("dokumentasi_foto_sebelum/".$id);
        $filesProses = Storage::disk('public')->allFiles("dokumentasi_foto_proses/".$id);
        $filesSetelah = Storage::disk('public')->allFiles("dokumentasi_foto_setelah/".$id);
        $fileLokasi = Storage::disk('public')->allFiles("foto_lokasi/".$id);

        $pelanggarans = DB::table('pelanggarans')
                        ->select(
                            'pelanggarans.id',
                            'pelanggarans.id_jenis_laporan',
                            'regus.nama as regu',
                            'pelanggarans.tgl_peristiwa',
                            'kegiatans.nama as kegiatan',
                            'pelanggarans.id_kegiatan',
                            'pelanggarans.tema_reklame',
                            'vendors.nama as pemilik',
                            'jenis_reklames.nama as jenis_reklame',
                            'pelanggarans.jumlah_reklame',
                            // 'jenis_pelanggarans.nama as jenis_pelanggaran',
                            'pelanggarans.id_jenis_pelanggaran',
                            'tindak_lanjuts.nama as tindak_lanjut',
                            'pelanggarans.alamat',
                            'pelanggarans.lat',
                            'pelanggarans.lon',
                            'jenis_pkls.nama as pkl',
                            'pelanggarans.pkl_nama',
                            'pelanggarans.pkl_no_identitas',
                            'pelanggarans.pkl_alamat',
                            'jenis_anjal_gepengs.nama as anjalgepeng',
                            'pelanggarans.anjal_gepeng_nama',
                            'pelanggarans.anjal_gepeng_no_identitas',
                            'pelanggarans.psk_nama',
                            'pelanggarans.psk_no_identitas',
                            'pelanggarans.minol_nama',
                            'pelanggarans.minol_no_identitas',
                            'pelanggarans.pemondokan_nama',
                            'pelanggarans.pemondokan_no_identitas',
                            'pelanggarans.parkir_nama',
                            'pelanggarans.parkir_no_identitas',
                            'jenis_penertiban_prokes.nama as prokes',
                            'pelanggarans.id_jenis_pelaku_usaha',
                            'pelanggarans.prokes_nama',
                            'pelanggarans.prokes_no_identitas',
                            'pelanggarans.created_at'

                        )
                        ->join('regus','regus.id','=','pelanggarans.id_regu','left')
                        ->join('kegiatans','kegiatans.id','=','pelanggarans.id_kegiatan','left')
                        ->join('vendors','vendors.id','=','pelanggarans.id_pemilik','left')
                        ->join('jenis_reklames','jenis_reklames.id','=','pelanggarans.id_jenis_reklame','left')
                        // ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran','left')
                        ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut','left')
                        ->join('jenis_pkls','jenis_pkls.id','=','pelanggarans.id_jenis_pkl','left')
                        ->join('jenis_anjal_gepengs','jenis_anjal_gepengs.id','=','pelanggarans.id_jenis_anjal_gepeng','left')
                        ->join('jenis_penertiban_prokes','jenis_penertiban_prokes.id','=','pelanggarans.id_jenis_penertiban_prokes','left')
                        ->where('pelanggarans.id','=',$id)
                        ->get();

        $id_pelanggarans = explode("-",$pelanggarans[0]->id_jenis_pelanggaran);

        $jenisPelanggarans = DB::table('jenis_pelanggarans')
                                ->select('nama')
                                ->wherein('id', $id_pelanggarans)
                                ->get();

        return view('detail_pelanggaran', ['pelanggaran' => $pelanggarans[0], 'foto_sebelum' => $filesSebelum, 'foto_proses' => $filesProses, 'foto_setelah' => $filesSetelah, 'foto_lokasi' => $fileLokasi, 'jenisPelanggarans' => $jenisPelanggarans]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        


        $regus              = Regu::select('*')->where('keterangan','=','1')->get();
        $kegiatans          = Kegiatan::select('*')->get();
        $vendors            = Vendor::select('*')->orderBy('nama')->get();
        $jenis_reklames     = Jenis_reklame::select('*')->orderBy('nama')->get();
        // $Jenis_pelanggarans = Jenis_pelanggaran::select('*')->orderBy('nama')->get();
        $tindak_lanjuts     = Tindak_lanjut::select('*')->orderBy('nama')->get();
        $ukuran_reklames    = Ukuran_reklame::select('*')->orderBy('nama')->get();
        $kecamatans         = Kecamatan::select('*')->orderBy('nama')->get();
        $kelurahans         = Kelurahan::select('*')->orderBy('nama')->get();
        $jenis_pkls         = Jenis_pkl::select('*')->orderBy('nama')->get();
        $jenis_anjal_gepeng = Jenis_anjal_gepeng::select('*')->orderBy('nama')->get();
        $jenis_penertiban_prokes    =   Jenis_penertiban_prokes::select('*')->orderBy('nama')->get();
        $pelanggaran =   pelanggaran::select('*')->where('id','=',$id)->get();

       
        $Jenis_pelanggarans = Jenis_pelanggaran::select('*')->where('kategori','=',$pelanggaran[0]->id_kegiatan)->orderBy('nama')->get();
       
        return view('edit_pelanggaran',[
            'regus'             => $regus, 
            'kegiatans'         => $kegiatans, 
            'vendors'           => $vendors,
            'jenis_reklames'    => $jenis_reklames,
            'jenis_pelanggarans'=> $Jenis_pelanggarans,
            'tindak_lanjuts'    => $tindak_lanjuts,
            'ukuran_reklames'   => $ukuran_reklames,
            'kecamatans'        => $kecamatans,
            'kelurahans'        => $kelurahans,
            'jenis_pkls'        => $jenis_pkls,
            'jenis_anjal_gepengs'=> $jenis_anjal_gepeng,
            'jenis_penertiban_prokess'   => $jenis_penertiban_prokes,
            'id_kegiatan' => $pelanggaran[0]->id_kegiatan,
            'pelanggaran' => $pelanggaran[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelanggaranRequest  $request
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelanggaranRequest $request, Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggaran $pelanggaran)
    {
        try{
            $pelanggaran = pelanggaran::findOrFail($pelanggaran->id);
            $pelanggaran->delete();
            Storage::disk('public')->deleteDirectory("dokumentasi_foto_sebelum/".$pelanggaran->id);
            Storage::disk('public')->deleteDirectory("dokumentasi_foto_proses/".$pelanggaran->id);
            Storage::disk('public')->deleteDirectory("dokumentasi_foto_setelah/".$pelanggaran->id);
            Storage::disk('public')->deleteDirectory("foto_lokasi/".$pelanggaran->id);
            return Redirect::back()->with(['successhapus' => "berhasil hapus data "]);

        }
        catch(Exception $e){
             return Redirect::back()->with(['errorhapus' => $e->getMessage()]);
        }
        
    }

    public static function getJumlahPelanggaran(){

        

        for ($i=0; $i < 9; $i++) { 
            $data[$i]   = Pelanggaran::where('id_kegiatan',$i+1)
                            ->orderBy('tgl_peristiwa')
                            ->take(100)
                            ->count();
        }

        return $data;
    }


    public function pelanggaran_print($id)
    {
        
        $filesSebelum = Storage::disk('public')->allFiles("dokumentasi_foto_sebelum/".$id);
        $filesProses = Storage::disk('public')->allFiles("dokumentasi_foto_proses/".$id);
        $filesSetelah = Storage::disk('public')->allFiles("dokumentasi_foto_setelah/".$id);
        $fileLokasi = Storage::disk('public')->allFiles("foto_lokasi/".$id);

        $pelanggarans = DB::table('pelanggarans')
                        ->select(
                            'pelanggarans.id',
                            'pelanggarans.id_jenis_laporan',
                            'regus.nama as regu',
                            'pelanggarans.tgl_peristiwa',
                            'kegiatans.nama as kegiatan',
                            'pelanggarans.id_kegiatan',
                            'pelanggarans.tema_reklame',
                            'vendors.nama as pemilik',
                            'jenis_reklames.nama as jenis_reklame',
                            'pelanggarans.jumlah_reklame',
                            // 'jenis_pelanggarans.nama as jenis_pelanggaran',
                            'pelanggarans.id_jenis_pelanggaran',
                            'tindak_lanjuts.nama as tindak_lanjut',
                            'pelanggarans.alamat',
                            'pelanggarans.lat',
                            'pelanggarans.lon',
                            'jenis_pkls.nama as pkl',
                            'pelanggarans.pkl_nama',
                            'pelanggarans.pkl_no_identitas',
                            'pelanggarans.pkl_alamat',
                            'jenis_anjal_gepengs.nama as anjalgepeng',
                            'pelanggarans.anjal_gepeng_nama',
                            'pelanggarans.anjal_gepeng_no_identitas',
                            'pelanggarans.psk_nama',
                            'pelanggarans.psk_no_identitas',
                            'pelanggarans.minol_nama',
                            'pelanggarans.minol_no_identitas',
                            'pelanggarans.pemondokan_nama',
                            'pelanggarans.pemondokan_no_identitas',
                            'pelanggarans.parkir_nama',
                            'pelanggarans.parkir_no_identitas',
                            'jenis_penertiban_prokes.nama as prokes',
                            'pelanggarans.id_jenis_pelaku_usaha',
                            'pelanggarans.prokes_nama',
                            'pelanggarans.prokes_no_identitas'

                        )
                        ->join('regus','regus.id','=','pelanggarans.id_regu','left')
                        ->join('kegiatans','kegiatans.id','=','pelanggarans.id_kegiatan','left')
                        ->join('vendors','vendors.id','=','pelanggarans.id_pemilik','left')
                        ->join('jenis_reklames','jenis_reklames.id','=','pelanggarans.id_jenis_reklame','left')
                        // ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran','left')
                        ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut','left')
                        ->join('jenis_pkls','jenis_pkls.id','=','pelanggarans.id_jenis_pkl','left')
                        ->join('jenis_anjal_gepengs','jenis_anjal_gepengs.id','=','pelanggarans.id_jenis_anjal_gepeng','left')
                        ->join('jenis_penertiban_prokes','jenis_penertiban_prokes.id','=','pelanggarans.id_jenis_penertiban_prokes','left')
                        ->where('pelanggarans.id','=',$id)
                        ->get();


        $id_pelanggarans = explode("-",$pelanggarans[0]->id_jenis_pelanggaran);

        $jenisPelanggarans = DB::table('jenis_pelanggarans')
                                ->select('nama')
                                ->wherein('id', $id_pelanggarans)
                                ->get();

        return view('detail_pelanggaran_print', ['pelanggaran' => $pelanggarans[0], 'foto_sebelum' => $filesSebelum, 'foto_proses' => $filesProses, 'foto_setelah' => $filesSetelah, 'foto_lokasi' => $fileLokasi,'jenisPelanggarans' => $jenisPelanggarans]);
    }









  

}
