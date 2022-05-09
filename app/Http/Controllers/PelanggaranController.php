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

use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

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
        $pelanggarans = Pelanggaran::select(
                                'regus.nama as nama_regu',
                                'kegiatans.nama as nama_kegiatan',
                                // 'vendors.nama as nama_vendor',
                                'jenis_pelanggarans.nama as nama_pelanggaran',
                                'tindak_lanjuts.nama as nama_tindak_lanjut',
                                'tgl_peristiwa'
                        );

        // $pelanggarans = $pelanggarans->join('vendors','vendors.id', '=','pelanggarans.id_pemilik');
        $pelanggarans = $pelanggarans->join('regus','regus.id', '=','pelanggarans.id_regu');
        $pelanggarans = $pelanggarans->join('kegiatans','kegiatans.id', '=','pelanggarans.id_kegiatan');
        $pelanggarans = $pelanggarans->join('jenis_pelanggarans','jenis_pelanggarans.id', '=','pelanggarans.id_jenis_pelanggaran');
        $pelanggarans = $pelanggarans->join('tindak_lanjuts','tindak_lanjuts.id', '=','pelanggarans.id_tindak_lanjut');


        if (isset($_GET['id_kegiatan'])) {

            $pelanggarans = $pelanggarans->where('id_kegiatan',$_GET['id_kegiatan'])
                        ->get();

        }else{
            $pelanggarans = $pelanggarans->get();
        }
        
        $data = [];

        

        foreach ($pelanggarans as $pelanggaran) {


            $data[] = array(
                "id" => $pelanggaran->id,
                "nama_regu" => $pelanggaran->nama_regu,
                "nama_kegiatan" => $pelanggaran->nama_kegiatan,
                "nama_pemilik" => $pelanggaran->nama_vendor,
                "nama_pelanggaran"  => $pelanggaran->nama_pelanggaran,
                "nama_tindak_lanjut"  => $pelanggaran->nama_tindak_lanjut,
                "tgl_peristiwa" => $pelanggaran->tgl_peristiwa
                
            );

        }
        // print_r($data);
        $json_data = json_encode($data);

        // echo $pelanggaran;
         return view('list_pelanggaran', ['pelanggarans' => $json_data]);
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
            $pelanggaran->id_regu           = $request->id_regu;
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

            //image / bukti
            
                for ($i=1; $i <= 5; $i++) { 
                    if (isset($request->foto_sebelum_[$i])) {
                        $pelanggaran->foto_sebelum1 = $request->foto_sebelum_[$i];
                    }
                    
                    if (isset($request->foto_proses_[$i])) {
                        $pelanggaran->foto_proses1 = $request->foto_proses_[$i];
                    }

                    if (isset($request->foto_setelah_[$i])) {
                        $pelanggaran->foto_setelah1 = $request->foto_setelah_[$i];
                    }

                }

                $pelanggaran->save();

                try{
                    for ($i=1; $i <= 5; $i++) { 
                        if (isset($pelanggaran->id)) {
                                if (isset($request->foto_sebelum_[$i])) {
                                    Storage::disk('local')->put("dokumentasi_foto_sebelum/".$pelanggaran->id, $request->foto_sebelum_[$i]);
                                }
                                
                                if (isset($request->foto_proses_[$i])) {
                                    Storage::disk('local')->put("dokumentasi_foto_proses/".$pelanggaran->id, $request->foto_proses_[$i]);
                                }

                                if (isset($request->foto_setelah_[$i])) {
                                    Storage::disk('local')->put("dokumentasi_foto_setelah/".$pelanggaran->id, $request->foto_setelah_[$i]);
                                }
                        }
                    }
                }catch(\Exception $e){
                    echo $e->getMessage();
                }

            return redirect('/pelanggaran?id_kegiatan='.$request->id_kegiatan)->with(['success' => 'berhasil']);

        }catch(Exception $e){
            return Redirect::back()->with(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        //
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
