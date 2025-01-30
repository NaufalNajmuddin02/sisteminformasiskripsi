<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalSeminarController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function jadwalseminar()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('jadwal-seminar-proposal');
    }
}