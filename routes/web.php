<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanProposalController;
use App\Http\Controllers\PendaftaranSeminarProposalController;
use App\Http\Controllers\PengajuanPembimbingController;
use App\Http\Controllers\LogBimbinganController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\JadwalBimbinganController;
use App\Http\Controllers\JadwalSeminarController;
use App\Http\Controllers\JadwalYudisiumController;
use App\Http\Controllers\skripsi\PengumpulanBerkasAkhirController;

//auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);


//dashboard
Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard')->middleware('auth');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('edit-profile');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('update-profile');
Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('update-password');
Route::put('/profile/update-picture', [AuthController::class, 'updateProfilePicture'])->name('update-gambar-profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//skripsi
Route::get('/pengajuanproposal', [PengajuanProposalController::class, 'pengajuanproposal'])->name('pengajuan-proposal');
Route::get('/proposals/create', [ProposalController::class, 'formpengajuanproposal'])->name('form-pengajuan-proposal');
Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store');
Route::get('/pengumpulanberkasakhir',[PengumpulanBerkasAkhirController::class,'pengumpulanberkasakhir'])->name('pengumpulan-berkas-akhir');

//bimbingan
Route::get('/pendaftaranseminarproposal',[PendaftaranSeminarProposalController::class, 'pendaftaranseminarproposal'])->name('pendaftaran-seminar-proposal');
Route::get('/pengajuanpembimbing',[PengajuanPembimbingController::class, 'pengajuanpembimbing'])->name('pengajuan-pembimbing');
Route::get('/logbimbingan',[LogBimbinganController::class, 'logbimbingan'])->name('log-bimbingan');

//jadwal
Route::get('/jadwalbimbingan',[JadwalBimbinganController::class, 'jadwalbimbingan'])->name('jadwal-bimbingan');
Route::get('/jadwalseminar',[JadwalSeminarController::class, 'jadwalseminar'])->name('jadwal-seminar-proposal');
Route::get('/jadwalyudisium',[JadwalYudisiumController::class, 'jadwalyudisium'])->name('jadwal-yudisium');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Route untuk dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard');
});

// Route untuk mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/', [AuthController::class, 'login']);