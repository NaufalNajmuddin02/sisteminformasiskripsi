<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogBimbinganController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function logbimbingan()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('log-bimbingan');
    }
}