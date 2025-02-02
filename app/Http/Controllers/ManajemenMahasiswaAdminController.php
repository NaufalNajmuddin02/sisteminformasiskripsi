<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenMahasiswaAdminController extends Controller
{
    public function index(){
        return view('admin.manajemen-mahasiswa');
    }
}
