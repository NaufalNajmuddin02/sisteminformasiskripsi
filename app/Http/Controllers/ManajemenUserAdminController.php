<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class ManajemenUserAdminController extends Controller
{
    //
    public function index(){
        $users = User::all(); // Ambil semua data user

        return view('admin.manajemen-user', compact('users'));
    }
}
