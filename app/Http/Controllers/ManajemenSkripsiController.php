<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenSkripsiController extends Controller
{
    public function index()
    {
        return view('admin.manajemen-skripsi');
    }
}
