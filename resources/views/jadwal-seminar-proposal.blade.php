<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTA - Jadwal Seminar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel ="stylesheet" href="css/tampilan/jadwalseminar.css">
</head>
<body>
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
    <div class="container my-4">
        <div class="d-flex align-items-center mb-3">
            <h1 class="me-3 mb-0">JADWAL SEMINAR</h1>
        </div>
        <hr>
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="text-center text-muted p-4">Belum ada jadwal</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <p class="mb-0">Copyright © 2024 - SISTA</p>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>