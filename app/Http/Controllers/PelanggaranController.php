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
use DB;

use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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
    public function index()
    {

        $id_kegiatan = "1";
        $pelanggarans = DB::table('pelanggarans')
                        ->select(
                                'pelanggarans.id',
                                'regus.nama as nama_regu',
                                'kegiatans.nama as nama_kegiatan',
                                'jenis_pelanggarans.nama as nama_pelanggaran',
                                'tindak_lanjuts.nama as nama_tindak_lanjut',
                                'tgl_peristiwa'
                        )
                        ->join('regus','regus.id', '=','pelanggarans.id_regu', 'left')
                        ->join('kegiatans','kegiatans.id', '=','pelanggarans.id_kegiatan','left')
                        ->join('jenis_pelanggarans','jenis_pelanggarans.id', '=','pelanggarans.id_jenis_pelanggaran','left')
                        ->join('tindak_lanjuts','tindak_lanjuts.id', '=','pelanggarans.id_tindak_lanjut','left');


        if (isset($_GET['id_kegiatan'])) {

             $pelanggarans = $pelanggarans->where('id_kegiatan',$_GET['id_kegiatan']);
        }
        
        return view('list_pelanggaran', ['pelanggarans' => $pelanggarans->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $regus              = Regu::select('*')->get();
        $kegiatans          = Kegiatan::select('*')->get();
        $vendors            = Vendor::select('*')->orderBy('nama')->get();
        $jenis_reklames     = Jenis_reklame::select('*')->orderBy('nama')->get();
        $Jenis_pelanggarans = Jenis_pelanggaran::select('*')->orderBy('nama')->get();
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
            $pelanggaran                    = new Pelanggaran;

            //detail laporan
            $pelanggaran->id_jenis_laporan  = $request->id_jenis_laporan;
            
            $pelanggaran->tgl_peristiwa     = date_format(date_create($request->tgl_peristiwa),"Y-m-d");
            $pelanggaran->id_kegiatan       = $request->id_kegiatan;

            //detail pelanggaran reklame
            $pelanggaran->tema_reklame      = $request->tema_reklame;
            $pelanggaran->id_pemilik        = $request->id_pemilik;
            $pelanggaran->id_jenis_reklame  = $request->id_jenis_reklame;
            $pelanggaran->id_ukuran_reklame = $request->id_ukuran_reklame;
            $pelanggaran->jumlah_reklame    = $request->jumlah_reklame;

            //detail pkl
            $pelanggaran->id_jenis_pkl      = $request->id_jenis_pkl;
            $pelanggaran->pkl_nama          = $request->pkl_nama;
            $pelanggaran->pkl_no_identitas  = $request->pkl_no_identitas;
            $pelanggaran->pkl_alamat        = $request->pkl_alamat;

            //detail anjalgepeng
            $pelanggaran->id_jenis_anjal_gepeng      = $request->id_jenis_anjal_gepeng;
            $pelanggaran->anjal_gepeng_nama          = $request->anjal_gepeng_nama;
            $pelanggaran->anjal_gepeng_no_identitas  = $request->anjal_gepeng_no_identitas;

            //detail PSK
            $pelanggaran->psk_nama          = $request->psk_nama;
            $pelanggaran->psk_no_identitas  = $request->psk_no_identitas;            
            $pelanggaran->psk_kelamin       = $request->psk_kelamin;

            //detail minol
            $pelanggaran->minol_nama          = $request->minol_nama;
            $pelanggaran->minol_no_identitas  = $request->minol_no_identitas;            

            //detail pemondokan
            $pelanggaran->pemondokan_nama          = $request->pemondokan_nama;
            $pelanggaran->pemondokan_no_identitas  = $request->pemondokan_no_identitas;            

            //detail parkir
            $pelanggaran->parkir_nama          = $request->parkir_nama;
            $pelanggaran->parkir_no_identitas  = $request->parkir_no_identitas;  

            //prokes
            $pelanggaran->id_jenis_penertiban_prokes    =    $request->id_jenis_penertiban_prokes;
            $pelanggaran->id_jenis_pelaku_usaha = $request->id_jenis_pelaku_usaha;
            $pelanggaran->prokes_nama           = $request->prokes_nama;
            $pelanggaran->prokes_no_identitas   =   $request->prokes_no_identitas;

            //pelanggaran & tindak lanjut
            $pelanggaran->id_jenis_pelanggaran  = $request->id_jenis_pelanggaran;
            $pelanggaran->id_tindak_lanjut      = $request->id_tindak_lanjut;

            //lokasi keterangan
            $pelanggaran->id_kecamatan  = $request->id_kecamatan;
            $pelanggaran->id_kelurahan  = $request->id_kelurahan;
            $pelanggaran->alamat        = $request->alamat;
            $pelanggaran->lat           = $request->lat;
            $pelanggaran->lon           = $request->lon;


            

            if ($request->id_regu == "tambahvalue") {
                $regu = new Regu;
                $regu->nama = $request->input_tambah_regu;
                $regu->save();
                $pelanggaran->id_regu = $regu->id;
            }else{
                $pelanggaran->id_regu   = $request->id_regu;    
            }

            $pelanggaran->save();



            try{
                if (isset($request->foto_lokasi)) {
                    Storage::disk('public')->put("foto_lokasi/".$pelanggaran->id, $request->foto_lokasi);                    
                }
            
            }catch(\Exception $e){
                return $e->getMessage();
            }

            // return redirect('/pelanggaran?id_kegiatan='.$request->id_kegiatan)->with(['success' => 'berhasil']); OLD
                return redirect('/pelanggaran/'.$pelanggaran->id);

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
                            'jenis_pelanggarans.nama as jenis_pelanggaran',
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
                        ->join('jenis_pelanggarans','jenis_pelanggarans.id','=','pelanggarans.id_jenis_pelanggaran','left')
                        ->join('tindak_lanjuts','tindak_lanjuts.id','=','pelanggarans.id_tindak_lanjut','left')
                        ->join('jenis_pkls','jenis_pkls.id','=','pelanggarans.id_jenis_pkl','left')
                        ->join('jenis_anjal_gepengs','jenis_anjal_gepengs.id','=','pelanggarans.id_jenis_anjal_gepeng','left')
                        ->join('jenis_penertiban_prokes','jenis_penertiban_prokes.id','=','pelanggarans.id_jenis_penertiban_prokes','left')
                        ->where('pelanggarans.id','=',$id)
                        ->get();

        
        // echo $pelanggarans[0];

        // echo $pelanggarans;

        return view('detail_pelanggaran', ['pelanggaran' => $pelanggarans[0], 'foto_sebelum' => $filesSebelum, 'foto_proses' => $filesProses, 'foto_setelah' => $filesSetelah, 'foto_lokasi' => $fileLokasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
      
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
        //
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
}
