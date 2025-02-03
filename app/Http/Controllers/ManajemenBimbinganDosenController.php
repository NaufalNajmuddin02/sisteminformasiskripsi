<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenBimbinganDosenController extends Controller
{
    public function index(){
        return view('dosen.manajemen-bimbingan');
    }
}
