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
use App\Http\Controllers\ManajemenSkripsiController;
use App\Http\Controllers\JadwalYudisiumController;
use App\Http\Controllers\ManajemenBimbinganDosenController;
use App\Http\Controllers\ManajemenDosenAdminController;
use App\Http\Controllers\ManajemenJadwalAdminController;
use App\Http\Controllers\ManajemenJadwalDosenController;
use App\Http\Controllers\ManajemenMahasiswaAdminController;
use App\Http\Controllers\ManajemenMahasiswaDosenController;
use App\Http\Controllers\ManajemenProposalDosenController;
use App\Http\Controllers\ManajemenSkripsiDosenController;
use App\Http\Controllers\ManajemenUserAdminController;
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
    Route::get('/admin/manajemen-skripsi', [ManajemenSkripsiController::class, 'index'])->name('admin.manajemen-skripsi');
    Route::get('/admin/manajemen-mahasiswa', [ManajemenMahasiswaAdminController::class, 'index'])->name('admin.manajemen-mahasiswa');
    Route::get('/admin/manajemen-dosen', [ManajemenDosenAdminController::class, 'index'])->name('admin.manajemen-dosen');
    Route::get('/admin/manajemen-user', [ManajemenUserAdminController::class, 'index'])->name('admin.manajemen-user');
    Route::get('/admin/jadwal', [ManajemenJadwalAdminController::class, 'index'])->name('admin.jadwal');
});

// Route untuk dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard');

    Route::get('/dosen/manajemen-bimbingan', [ManajemenBimbinganDosenController::class, 'index'])
    ->name('dosen.manajemen-bimbingan');
    Route::get('/dosen/manajemen-mahasiswa', [ManajemenMahasiswaDosenController::class, 'index'])
    ->name('dosen.manajemen-mahasiswa');
    Route::get('/dosen/manajemen-proposal', [ManajemenProposalDosenController::class, 'index'])
    ->name('dosen.manajemen-proposal');
    Route::get('/dosen/manajemen-skripsi', [ManajemenSkripsiDosenController::class, 'index'])
    ->name('dosen.manajemen-skripsi');
    Route::get('/dosen/jadwal', [ManajemenJadwalDosenController::class, 'index'])
    ->name('dosen.jadwal');

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