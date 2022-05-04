<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
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
        return view('insert_pelanggaran');
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

        print_r($request->all());

        try{
            $pelanggaran = new Pelanggaran;
            $pelanggaran->kategori_pelanggaran = $request->kategori_pelanggaran;
            $pelanggaran->id_jenis_laporan = $request->id_jenis_laporan;
            $pelanggaran->id_regu = $request->id_regu;
            $pelanggaran->id_kegiatan = $request->id_kegiatan;

            //reklame
            $pelanggaran->tema_reklame = $request->tema_reklame;
            $pelanggaran->id_pemilik = $request->id_pemilik;
            $pelanggaran->id_jenis_reklame = $request->id_jenis_reklame;
            $pelanggaran->jumlah_reklame = $request->jumlah_reklame;
            $pelanggaran->id_jenis_pelanggaran = $request->id_jenis_pelanggaran;
            //endreklame


            $pelanggaran->id_tindak_lanjut = $request->id_tindak_lanjut;
            $pelanggaran->id_propinsi = $request->id_propinsi;
            $pelanggaran->id_kab_kota = $request->id_kab_kota;
            $pelanggaran->id_kecamatan = $request->id_kecamatan;
            $pelanggaran->id_kelurahan = $request->id_kelurahan;
            $pelanggaran->alamat = $request->alamat;
            $pelanggaran->image = $request->image;
            $pelanggaran->lat = $request->lat;
            $pelanggaran->lon = $request->lon;
            $pelanggaran->tgl_peristiwa = date_format(date_create($request->tgl_peristiwa),"Y-m-d");
            $pelanggaran->save();
            
            return redirect('/pelanggaran');
        }catch(Exception $e){
            //echo $e->getMessage();
            Redirect::back()->withErrors(['msg' => $e->getMessage()]);
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
