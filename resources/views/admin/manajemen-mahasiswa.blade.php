@extends('admin.app')

@section('content')
<div class="container mt-4">
    <main>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4">Manajemen Mahasiswa</h2>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Semua
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Carl</a></li>
                        <li><a class="dropdown-item" href="#">Q</a></li>
                        <li><a class="dropdown-item" href="#">✔</a></li>
                    </ul>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">JUDUL</th>
                        <th class="text-center">Nama Pembimbing</th>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Data Kosong</td>
                    </tr>
                </tbody>
            </table>
        </main>
</div>
@endsection
