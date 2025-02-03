<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenJadwalDosenController extends Controller
{
    public function index(){
        return view('dosen.jadwal-dosen');
    }
}
