<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class ManajemenDosenAdminController extends Controller
{
    //
    public function index(){

        $users = User::where('role', 'dosen')->get();

        return view('admin.manajemen-dosen', compact('users'));

    }
}
