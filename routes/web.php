<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdministrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/front');
});

Route::get('/front', function () {
	return view('front');
});

Route::get('/report', function(){
	
	$data = KegiatanController::get_all_chart();
	$kecamatans = KegiatanController::get_kecamatan_chart();
	
	return view('report',['data' => $data, 'kecamatans' => $kecamatans]);
})->middleware(['auth']);



Route::get('/dashboard', function () {
    $data = PelanggaranController::getJumlahPelanggaran();
    return view('dashboard',[ 'data' => $data ]);
})->middleware(['auth'])->name('dashboard');



///PELANGGARAN
Route::resource('pelanggaran',PelanggaranController::class)->middleware(['auth']);
Route::get('pelanggaran/edit/{id}', [PelanggaranController::class, 'edit'])->middleware(['auth']);
Route::post('pelanggaran/upload_image', [PelanggaranController::class, 'upload_image']);
Route::get('pelanggaran/pelanggaran_print/{id}', [PelanggaranController::class, 'pelanggaran_print'])->name('pelanggaran_print');;

/////LAPORAN
Route::post('laporan/laporan_post', [LaporanController::class, 'laporan_post'])->name('laporan_post');
Route::get('laporan/index', [LaporanController::class, 'index'])->name('laporan_index');
Route::get('laporan/detail/{id}', [LaporanController::class, 'detail'])->name('laporan_detail');
Route::get('laporan/detail_print/{id}', [LaporanController::class, 'detail_print'])->name('laporan_detail_print');
Route::get('laporan/proses_laporan/{id}',[LaporanController::class, 'proses_laporan'])->name('proses_laporan');
Route::get('laporan/un_proses_laporan/{id}',[LaporanController::class, 'un_proses_laporan'])->name('un_proses_laporan');

///API GRAFIK
Route::get('laporan/api_total_kegiatan/{tahun}',[LaporanController::class, 'api_total_kegiatan'])->name('api_total_kegiatan');
Route::get('laporan/api_jenis_penertiban/{tahun}',[LaporanController::class, 'api_jenis_penertiban'])->name('api_jenis_penertiban');
Route::get('laporan/api_lokasi_pelanggaran/{tahun}',[LaporanController::class, 'api_lokasi_pelanggaran'])->name('api_lokasi_pelanggaran');
Route::get('laporan/api_jenis_reklame/{tahun}',[LaporanController::class, 'api_jenis_reklame'])->name('api_jenis_reklame');


////ADMINISTRATION
Route::get('administration/index',[AdministrationController::class, 'index'])->name('dashboard_admin')->middleware(['auth']);




////////////TESTING
Route::get('getfile', [PelanggaranController::class, 'getfile']);
Route::get('/greeting', function () {
    return 'Hello World';
});

require __DIR__.'/auth.php';



