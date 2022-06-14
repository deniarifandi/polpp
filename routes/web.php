<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;

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

	// $data = KegiatanController::get_label_chart();
	$data = KegiatanController::get_all_chart();
	$kecamatans = KegiatanController::get_kecamatan_chart();
	// echo $data;
	return view('report',['data' => $data, 'kecamatans' => $kecamatans]);
})->middleware(['auth']);

Route::get('/dashboard', function () {

    $data = PelanggaranController::getJumlahPelanggaran();

    return view('dashboard',[ 'data' => $data ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('pelanggaran',PelanggaranController::class)->middleware(['auth']);

Route::post('pelanggaran/upload_image', [PelanggaranController::class, 'upload_image']);

Route::post('laporan/laporan_post', [LaporanController::class, 'laporan_post'])->name('laporan_post');;

Route::get('getfile', [PelanggaranController::class, 'getfile']);

Route::get('/greeting', function () {
    return 'Hello World';
});

require __DIR__.'/auth.php';
