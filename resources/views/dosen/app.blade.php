<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTA Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        .profile-menu {
            position: relative;
        }

        .profile-dropdown {
            position: absolute;
            top: 100%; /* Tepat di bawah elemen profil */
            left: 0; /* Sesuaikan dengan lebar elemen */
            transform: translateY(5px); /* Memberi sedikit jarak */
            min-width: 200px; /* Ukuran minimum dropdown */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Shadow dropdown */
        }

        .profile-dropdown::before {
            content: '';
            position: absolute;
            top: -5px; /* Posisi panah */
            left: 20px; /* Sesuaikan posisi panah */
            border-width: 0 5px 5px 5px;
            border-style: solid;
            border-color: transparent transparent #ffffff transparent; /* Warna panah */
        }
        .bg-maroon {
            background-color: #800000; /* Warna maroon */
            color: white;
        }

        .navbar-dark .nav-link {
            color: white;
        }

        .navbar-dark .nav-link:hover {
            color: #dcdcdc; /* Warna hover */
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 15px; /* Jarak antar elemen */
        }

        .navbar-brand {
            margin-right: 10px; /* Jarak antara SISTA dan elemen lainnya */
        }

        .navbar-nav img {
            width: 30px;
            height: 30px;
            object-fit: cover;
        }

        /* Flexbox Layout */
        html, body {
            height: 100%; /* Pastikan halaman mengambil seluruh tinggi viewport */
            margin: 0;
            display: flex;
            flex-direction: column; /* Atur elemen dalam kolom */
        }

        main {
            flex: 1; /* Ambil sisa ruang di antara header dan footer */
        }

        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-maroon">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dosen.dashboard') }}">SISTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Grup Elemen Kiri -->
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dosen.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="manajemenDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manajemen
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="manajemenDropdown">
                            <li><a class="dropdown-item" href="{{ route('dosen.manajemen-bimbingan') }}">Manajemen Bimbingan</a></li>
                            <li><a class="dropdown-item" href="{{ route('dosen.manajemen-mahasiswa') }}">Manajemen Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="{{ route('dosen.manajemen-proposal') }}">Manajemen Proposal</a></li>
                            <li><a class="dropdown-item" href="{{ route('dosen.manajemen-skripsi') }}">Manajemen Skripsi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dosen.jadwal') }}">Jadwal</a></li>
                </ul>

                <!-- Grup Elemen Kanan -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-bell"></i></a></li>
                    <div class="profile-menu">
                        <a href="#" 
                        class="d-flex align-items-center text-decoration-none" 
                        data-bs-toggle="dropdown" 
                        data-bs-display="static">
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
                                class="rounded-circle me-2" width="35" height="35">
                            <span class="text-white">{{ auth()->user()->username }}</span>
                        </a>
                        <div class="dropdown-menu profile-dropdown p-3">
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

                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <small>Copyright © 2024 - SISTA</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
