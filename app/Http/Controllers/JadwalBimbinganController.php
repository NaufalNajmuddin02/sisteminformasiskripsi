<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalBimbinganController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function jadwalbimbingan()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('jadwal-bimbingan');
    }
}