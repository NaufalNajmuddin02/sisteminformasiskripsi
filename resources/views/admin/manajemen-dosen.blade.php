@extends('admin.app')

@section('content')
<div class="container mt-4">
    <main>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4">Manajemen Dosen</h2>
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
                        <th class="text-center">username</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Prodi</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->username }}</td>
                        <td class="text-center">{{ $user->kelas }}</td>
                        <td class="text-center">{{ $user->prodi }}</td>
                        <td class="text-center">{{ $user->nim }}</td>
                        <td class="text-center">{{ $user->semester }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
</div>
@endsection
