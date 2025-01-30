<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTA - Pengumpulan Berkas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/skripsi/pengumpulanberkasakhir.css">
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
                            <li><a class="dropdown-item" href="#">List Pengajuan</a></li>
                            <li><a class="dropdown-item" href="#">Berkas Proposal</a></li>
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
    <div class="main-content">
        <div class="container">
            <div class="form-container">
                <h2 class="mb-4">Pengumpulan Berkas Akhir</h2>
                
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-select">
                            <option selected>B</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" placeholder="dd-mm-yy">
                                <span class="date-picker-icon">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Selesai</label>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" placeholder="dd-mm-yy">
                                <span class="date-picker-icon">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Skripsi</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Periode</label>
                        <select class="form-select">
                            <option selected>-- Pilih Periode Mulai --</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Skripsi</label>
                        <div class="input-group">
                            <button class="btn btn-secondary" type="button">Pilih File</button>
                            <input type="text" class="form-control" placeholder="Tidak ada file yang di pilih" readonly>
                        </div>
                        <small class="text-muted">pdf, doc, docx (maksimal 20mb)</small>
                    </div>

                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-danger me-2">Batalkan</button>
                        <button type="submit" class="btn btn-success">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p class="mb-0">Copyright © 2024 - SISTA</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-kit-code.js"></script>
</body>
</html>