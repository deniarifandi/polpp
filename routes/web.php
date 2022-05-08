<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelanggaranController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {

    $data = PelanggaranController::getJumlahPelanggaran();

    return view('dashboard',[ 'data' => $data ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('pelanggaran',PelanggaranController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
