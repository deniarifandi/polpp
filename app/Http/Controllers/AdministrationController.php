<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\Regu;

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
}
