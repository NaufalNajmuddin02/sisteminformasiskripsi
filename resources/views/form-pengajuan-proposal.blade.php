<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Judul Proposal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tampilan/formproposal.css">
</head>

<style>
    /* navbar */
    .navbar {
        background-color: rgb(163, 4, 4) !important;
        color: white !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        color: white !important;
        font-size: 1.5rem;
        margin-left: 90px;
    }
    .profile-menu {
        margin-right: 90px;
    }

    .navbar-nav .nav-link {
        color: white !important;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ddd !important;
    }

    .dropdown-menu {
        min-width: 250px;
    }

    .profile-dropdown {
        right: 20px;
        top: 60px;
        min-width: 280px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
    .profile-img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #3b82f6;
    }

</style>
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

    <div class="container mt-5">
        <h2>Pengajuan Judul Proposal</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('proposals.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <select name="class" id="class" class="form-select" required>
                    <option value="">Pilih Kelas</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="submission_date" class="form-label">Tanggal Pengajuan</label>
                <input type="date" name="submission_date" id="submission_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="script_title" class="form-label">Judul Skripsi</label>
                <input type="text" name="script_title" id="script_title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="abstract" class="form-label">Abstrak</label>
                <textarea name="abstract" id="abstract" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
