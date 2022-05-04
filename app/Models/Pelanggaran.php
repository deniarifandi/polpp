<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    public function getIdreguAttribute($id_regu){
        if ($id_regu == 1) {
            return "Tim Beruang";
        }elseif ($id_regu == 2) {
            return "Regu 1";
        }elseif ($id_regu == 3) {
            return "Regu 2";
        }elseif ($id_regu == 4) {
            return "Regu 3";
        }
    }

    public function getIDkegiatanAttribute($id_kegiatan){
        if ($id_kegiatan == 1) {
            return "Penertiban Reklame";
        }else if($id_kegiatan == 2){
            return "Penertiban PKL";
        }else if($id_kegiatan == 3){
            return "Penertiban AnJal-GePeng";
        }else if($id_kegiatan == 4){
            return "Penertiban PSK";
        }else if($id_kegiatan == 5){
            return "Penertiban Minol";
        }else if($id_kegiatan == 6){
            return "Penertiban Pemondokan";
        }else if($id_kegiatan == 7){
            return "Penertiban Parkir Liar";
        }else if($id_kegiatan == 8){
            return "Penertiban Prokes";
        }
    }
}
