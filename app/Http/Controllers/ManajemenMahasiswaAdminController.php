<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class ManajemenMahasiswaAdminController extends Controller
{
    public function index(){

        $users = User::where('role', 'mahasiswa')->get();
        return view('admin.manajemen-mahasiswa', compact('users'));
    }
}
