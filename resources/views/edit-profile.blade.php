<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        .form-control {
            margin-bottom: 15px;
        }
        .profile-section {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-simpan {
            background-color: #00a65a;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
        }
    </style>
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
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-section">
                    <form action="{{ route('update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nim</label>
                            <input type="text" class="form-control" name="nim" value="{{ auth()->user()->nim }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <input type="text" class="form-control" name="prodi" value="{{ auth()->user()->prodi }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <input type="text" class="form-control" name="semester" value="{{ auth()->user()->semester }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas" value="{{ auth()->user()->kelas }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No. HP</label>
                            <input type="text" class="form-control" name="no_hp" value="{{ auth()->user()->no_hp }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="profile-section">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password baru">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Masukkan Lagi</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="masukkan password baru">
                        </div>

                        <button type="submit" class="btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="profile-section">
                    <form action="{{ route('update-gambar-profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Foto Profil</label>
                            <div class="mb-3">
                                @if(auth()->user()->profile_picture)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
                                         alt="Profile Picture" 
                                         class="img-fluid mb-3" 
                                         style="max-width: 200px;">
                                @endif
                            </div>
                            <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                            <small class="text-muted">File foto harus jpg / png,<br>dan ukuran file harus di bawah 2MB.</small>
                        </div>

                        <button type="submit" class="btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>