<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenJadwalAdminController extends Controller
{
    //
    public function index(){
        return view('admin.jadwal-admin');
    }
}
