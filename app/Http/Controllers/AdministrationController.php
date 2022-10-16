<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\Regu;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class AdministrationController extends Controller
{
    public function index(){

        $Administration = Administration::select("*")->get();
        return view('admin_dashboard',['admin' => $Administration]);

    }

    public function update_config(Request $request){
            
        echo $request->judul;

        $pelanggaran = Administration::find(1);
        $pelanggaran->value = $request->judul;
        $pelanggaran->save();

        $pelanggaran = Administration::find(2);
        $pelanggaran->value = $request->alamat;
        $pelanggaran->save();

        $pelanggaran = Administration::find(3);
        $pelanggaran->value = $request->email;
        $pelanggaran->save();

        $pelanggaran = Administration::find(4);
        $pelanggaran->value = $request->telepon;
        $pelanggaran->save();
        
        return redirect('administration/index')->with(['success' => "berhasil tambah data "]);;

    }

    public function list_grup(Request $request){

        $regus = Regu::select('*')->get();

        return view('list_grup',['regus' => $regus]);
    }

    public function nonaktifkan_grup($id){
        $pelanggaran = Regu::find($id);
        $pelanggaran->keterangan = 0;
        $pelanggaran->save();

        return redirect('administration/list_grup');
    }

    public function aktifkan_grup($id){
        $pelanggaran = Regu::find($id);
        $pelanggaran->keterangan = 1;
        $pelanggaran->save();

        return redirect('administration/list_grup');
    }

    public function tambah_grup(Request $request){
        $regu = new Regu;
        $regu->nama = $request->nama;
        $regu->keterangan = 1;
        $regu->save();
        return redirect('administration/list_grup');    
    }

    public function export_data(Request $request){


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
                         $pelanggarans = $pelanggarans->orwhere('jenis_reklames.nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('jenis_anjal_gepengs.nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.anjal_gepeng_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.anjal_gepeng_no_identitas','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.psk_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.psk_no_identitas','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.minol_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.minol_no_identitas','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.psk_kelamin','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.pemondokan_no_identitas','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.pemondokan_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.parkir_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.parkir_no_identitas','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.prokes_nama','LIKE','%'.$cari.'%');
                         $pelanggarans = $pelanggarans->orwhere('pelanggarans.prokes_no_identitas','LIKE','%'.$cari.'%');
                          
                        }

                        $pelanggarans = $pelanggarans->orderBy('id','desc');


        if (isset($_GET['id_kegiatan'])) {

             $pelanggarans = $pelanggarans->where('id_kegiatan',$_GET['id_kegiatan']);
             $id_kegiatan = $_GET['id_kegiatan'];
        }
        
        // return view('list_pelanggaran', ['pelanggarans' => $pelanggarans->paginate(10), 'id_kegiatan' => $id_kegiatan]);

        return view('export_data', ['pelanggarans' => $pelanggarans->get(), 'id_kegiatan' => $id_kegiatan]);
    }


    public function get_reklame(){

        $jenis_reklame = "PERMANEN";
        $tgl_awal = date("YYYY-MM-DD");
        $tgl_akhir = date("YYYY-MM-DD");

        // $tgl_awal = "2022-09-01";

        if (isset($_GET['tgl_awal'])) {
            $tgl_awal = $_GET['tgl_awal'];
        }
        if (isset($_GET['tgl_akhir'])) {
            $tgl_akhir = $_GET['tgl_akhir'];
        }
        if (isset($_GET['jenis_reklame'])) {
            $jenis_reklame = $_GET['jenis_reklame'];
        }

        $response = Http::withBasicAuth('inaPopP', 'SATPOL-Izol2022' )->get('https://izol.malangkota.go.id/backend/index.php/api/getTerbitReklame?jenis='.$jenis_reklame.'&tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir);

        $collection = collect($response["Status"]["Data"]);

        $sorted = $collection->sortBy('berlaku_akhir');
        

        $final = $sorted->values()->all();

        return view('integrasi_izol',['responses' => $final]);
    }
}
