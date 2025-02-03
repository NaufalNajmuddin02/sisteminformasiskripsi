<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenProposalDosenController extends Controller
{
    //
    public function index(){
        return view('dosen.manajemen-proposal');
    }
}
