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

use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;
use Illuminate\Http\Request;
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
        $pelanggarans = Pelanggaran::select('*');
        $pelanggarans = $pelanggarans->join('vendors','vendors.id', '=','pelanggarans.id_pemilik');

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
                "id_regu" => $pelanggaran->id_regu,
                "id_kegiatan" => $pelanggaran->id_kegiatan,
                "id_pemilik" => $pelanggaran->nama_vendor,
                "id_jenis_pelanggaran"  => $pelanggaran->id_jenis_pelanggaran,
                "id_tindak_lanjut"  => $pelanggaran->id_tindak_lanjut,
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
        
        // print_r($request->all());

        // print_r($request->all());

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
            $pelanggaran->image_sebelum = $request->image_sebelum;
            $pelanggaran->image_proses  = $request->image_proses;
            $pelanggaran->image_setelah = $request->image_setelah;
            
            $pelanggaran->save();
            
            return redirect('/pelanggaran');
        }catch(Exception $e){
            echo $e->getMessage();
            // Redirect::back()->withErrors(['msg' => $e->getMessage()]);
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

        $reklameTotal = Pelanggaran::where('id_kegiatan',1)
                            ->orderBy('tgl_peristiwa')
                            ->take(100)
                            ->count();

        return $reklameTotal;
    }
}
