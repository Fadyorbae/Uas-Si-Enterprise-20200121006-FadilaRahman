<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('index');
})->middleware(['auth'])->name('index');

Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'matakuliah' => MatakuliahController::class,
    'absen' => AbsenController::class,
    'jadwal' => JadwalController::class,
    'kontrak' => KontrakController::class,
    'semester' => SemesterController::class,
]);
require __DIR__.'/auth.php';
