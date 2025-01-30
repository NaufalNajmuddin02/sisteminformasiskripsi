<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanPembimbingController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function pengajuanpembimbing()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('pengajuan-pembimbing');
    }
}