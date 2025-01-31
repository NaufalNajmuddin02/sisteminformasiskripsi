<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTA Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tampilan/dashboard.css">
</head>
<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Skripsi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pengajuan-proposal') }}">Pengajuan Proposal</a></li>
                            <li><a class="dropdown-item" href="{{ route('pendaftaran-seminar-proposal') }}">Pengajuan Seminar Proposal</a></li>
                            <li><a class="dropdown-item" href="{{route('pengumpulan-berkas-akhir')}}">Berkas Proposal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Jadwal
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('jadwal-bimbingan')}}">Jadwal Bimbingan</a></li>
                            <li><a class="dropdown-item" href="{{ route('jadwal-seminar-proposal')}}">Jadwal Seminar</a></li>
                            <li><a class="dropdown-item" href="{{ route('jadwal-yudisium')}}">Jadwal Yudisium</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Bimbingan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pengajuan-pembimbing') }}">Permohonan Dosen Pembimbing</a></li>
                            <li><a class="dropdown-item" href="{{ route('log-bimbingan') }}">Log Bimbingan</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="me-3">🔔</span>
                    <div class="profile-menu">
                        <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
                                 class="rounded-circle me-2" width="35" height="35">
                            <span class="text-white">{{ auth()->user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown p-3 text-center">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/80' }}" 
                                     class="profile-img mx-auto">
                            </div>
                            <h5 class="mb-1">{{ auth()->user()->username }}</h5>
                            <p class="text-muted">{{ auth()->user()->nim }}</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="{{ route('edit-profile') }}" class="btn btn-primary">Edit Profil</a>
                                <a href="#" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Card -->
                <div class="card mb-3" style="background-color: #333; color: white;">
                    <div class="card-body d-flex align-items-center">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
                             class="rounded-circle me-3" width="50" height="50">
                        <div>
                            <h5 class="mb-1">{{ auth()->user()->username }}</h5>
                            <p class="mb-0">{{ auth()->user()->nim }}</p>
                        </div>
                        <span class="ms-auto badge status-badge">Aktif</span>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">Prodi</div>
                            <div class="col-8">{{ auth()->user()->prodi }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Semester</div>
                            <div class="col-8">{{ auth()->user()->semester }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kelas</div>
                            <div class="col-8">{{ auth()->user()->kelas }}</div>
                        </div>
                    </div>
                </div>

                <!-- Supervisor Card -->
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #8b0000; color: white;">
                        <h5 class="mb-0">Dosen Pembimbing</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-5">Dosen pembimbing 1</div>
                            <div class="col-7">Dosen X</div>
                        </div>
                        <div class="row">
                            <div class="col-5">Dosen pembimbing 2</div>
                            <div class="col-7">Dosen X</div>
                        </div>
                    </div>
                </div>

                <!-- Schedule Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ACARA</th>
                                    <th>WAKTU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center">TIDAK ADA ACARA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Calendar Card -->
                <div class="card mb-3">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h2 class="mb-1">KALENDER AKADEMIK</h2>
                            <h5 class="mb-2">2024/2025</h5>
                            <p class="mb-0">Semester Ganjil</p>
                        </div>
                        <div class="ms-auto calendar-icon p-2 rounded">
                            📅
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Terbaru</h5>
                        <h6>INFORMASI NOMOR PELAYANAN</h6>
                        <div class="row mb-2">
                            <div class="col-8">Administrasi Akademik</div>
                            <div class="col-4">03XXXXXXX</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-8">Administrasi Keuangan</div>
                            <div class="col-4">03XXXXXXX</div>
                        </div>
                        <div class="row">
                            <div class="col-8">Perpustakaan</div>
                            <div class="col-4">03XXXXXXX</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>