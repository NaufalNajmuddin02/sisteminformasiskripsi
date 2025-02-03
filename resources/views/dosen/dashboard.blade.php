@extends('dosen.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Profil User -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center">
                    <img src="{{ asset('path/to/user-profile.jpg') }}" alt="Foto Profil" class="rounded-circle me-3" style="width: 80px; height: 80px;">
                    <div>
                        <h5 class="mb-0">USERNAME</h5>
                        <p class="mb-0">{{ auth()->user()->name }}</p>
                        <span class="badge bg-success">Aktif</span>
                        <p class="mt-2 mb-0">Prodi: STr Teknik Informatika</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-semibold">
                    Jadwal
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Acara</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center">Tidak Ada Acara</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Informasi dan Kalender Akademik -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header fw-semibold">
                    Kalender Akademik
                </div>
                <div class="card-body text-center">
                    <h5>2024/2025</h5>
                    <p>Semester Ganjil</p>
                    <i class="bi bi-calendar-event" style="font-size: 40px; color: #800000;"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-semibold">
                    Informasi Terbaru
                </div>
                <div class="card-body">
                    <h6 class="fw-semibond">Informasi Nomor Pelayanan</h6>
                    <ul class="list-unstyled">
                        <li>Administrasi Akademik: 03XXXXXXXX</li>
                        <li>Administrasi Keuangan: 03XXXXXXXX</li>
                        <li>Perpustakaan: 03XXXXXXXX</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
