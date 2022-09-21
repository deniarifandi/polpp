<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;

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
}
