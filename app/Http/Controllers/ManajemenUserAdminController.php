<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenUserAdminController extends Controller
{
    //
    public function index(){
        return view('admin.manajemen-user');
    }
}
