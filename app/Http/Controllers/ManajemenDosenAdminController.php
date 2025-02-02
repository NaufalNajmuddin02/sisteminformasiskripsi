<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenDosenAdminController extends Controller
{
    //
    public function index(){
        return view('admin.manajemen-dosen');
    }
}
