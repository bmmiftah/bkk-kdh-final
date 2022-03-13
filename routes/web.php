<?php

use App\Models\Pengurus;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataVaksinControler;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DataVaksinController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardCarouselController;
use App\Http\Controllers\DashboardLowonganController;
use App\Http\Controllers\DashboardPengurusController;
use App\Http\Controllers\DashboardInformasiController;
use App\Http\Controllers\DashboardPerusahaanController;
use App\Http\Controllers\DashboardPendaftaranController;
use App\Models\Lowongan;

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


// verifikasi email user
// Auth::routes(['verify' => true]);


// Route::get('/lowongan',[LowonganController::class, 'index']);

Route::get('/', function () {
    return view('home', [
        "title" => "Beranda",
        "active" => 'home'
    ]);
});

// about
Route::get('/tentang', [AboutController::class, 'index']);

// lowongan
Route::get('/lowongan',[LowonganController::class, 'index']);
Route::get('/detail_lowongan/{lowongan:slug}',[LowonganController::class, 'show'])->middleware('auth');

// pendaftaran
Route::resource('/pendaftaran',PendaftaranController::class)->middleware('auth')->except('create');
Route::get('/pendaftaran/create/{slug}', [PendaftaranController::class, 'create']);


// halaman informasi dan detail informasi
Route::get('/informasi',[InformasiController::class, 'index']);
Route::get('/detail_informasi/{informasi:slug}',[InformasiController::class, 'show']);

// verify
Route::get('/verify/{email}/{token}', [RegisterController::class, 'verify'])->middleware('guest');

// forgot
Route::post('/forgot', [RegisterController::class, 'forgot'])->middleware('guest');

// lupa password
Route::get('/lupaPassword', [RegisterController::class, 'lupaPassword'])->middleware('guest');
Route::post('/storeLupaPassword', [RegisterController::class, 'storeLupaPassword'])->middleware('guest');

Route::get('/resetPassword/{email}/{token}', [RegisterController::class, 'resetPassword'])->middleware('guest');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// profil

// dashboard_profil
Route::resource('/profil', DashboardProfilController::class)->middleware('auth');

// vaksin
Route::resource('/vaksin', DataVaksinController::class)->middleware('auth');

// status Pendaftaran
Route::resource('/status', StatusController::class)->middleware('auth');

// admin access

// dashboard_admin
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('superAdmin');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dd', [DashboardController::class, 'index'])->middleware('admin');



    // Dashboard Informasi
    // slug
Route::get('/dashboard/informasi/checkSlug', [DashboardInformasiController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/informasi', DashboardInformasiController::class)->middleware('auth');

// Dashboard Lowongan
Route::get('/dashboard/lowongan/checkSlug', [DashboardLowonganController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/lowongan', DashboardLowonganController::class)->middleware('auth');
Route::put('/ll/{id}', function ($lowonganId) {
    //
    $lowongan=Lowongan::where('id', $lowonganId)->firstOrFail();
    if ($lowongan->status === 1) {
        $validatedData['status'] = 0;
     }elseif ($lowongan->status === 0) {
        $validatedData['status'] = 1;
     }

     Lowongan::where('id', $lowongan->id)->update($validatedData);
    return redirect('/dashboard/lowongan')->with('success', 'Status lowongan telah diperbaharui!');
});

// Dashboard Carousell

Route::resource('/dashboard/carousell', DashboardCarouselController::class)->middleware('auth');

// Dashboard Pengurus

Route::resource('/dashboard/pengurus', DashboardPengurusController::class)->middleware('auth');

// Dashboard Pendaftaran

Route::resource('/dashboard/pendaftaran', DashboardPendaftaranController::class)->middleware('auth');

Route::put('/pp/{id}', function ($pendaftaranId) {
    //
    $pendaftaran=Pendaftaran::where('id', $pendaftaranId)->firstOrFail();
    if ($pendaftaran->status === 'Verifikasi Data') {
        $validatedData['status'] = 'Ditolak, Gagal Verifikasi Data';
     }elseif ($pendaftaran->status === 'Lolos Tahap Psikotes') {
         $validatedData['status'] = 'Ditolak, Gagal Tahap Psikotes';
     }elseif ($pendaftaran->status === 'Lolos Tahap Wawancara') {
         $validatedData['status'] = 'Ditolak, Gagal Tahap Wawancara';
     }elseif ($pendaftaran->status === 'Lolos Tahap MCU') {
         $validatedData['status'] = 'Ditolak, Gagal Tahap MCU';
     }

     Pendaftaran::where('id', $pendaftaran->id)->update($validatedData);
    return redirect('/dashboard/pendaftaran')->with('success', 'Status pendaftaran telah diperbaharui!');
});

// super admin accsess
// Dashboard Perusahaan
Route::get('/dashboard/perusahaan/checkSlug', [DashboardPerusahaanController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/perusahaan', DashboardPerusahaanController::class)->middleware('auth');

// Dashboard Users

Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('auth');


// kirim email
Route::get('/kirim_email', [App\Http\Controllers\KirimEmailController::class, 'kirim']);

