<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenSkripsiDosenController extends Controller
{
    public function index(){
        return view('dosen.manajemen-skripsi');
    }
}
