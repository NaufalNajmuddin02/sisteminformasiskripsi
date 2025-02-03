<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenMahasiswaDosenController extends Controller
{
    public function index(){
        return view('dosen.manajemen-mahasiswa');
    }
}
