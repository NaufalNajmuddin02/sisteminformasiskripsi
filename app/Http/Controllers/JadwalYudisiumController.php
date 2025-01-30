<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalYudisiumController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function jadwalyudisium()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('jadwal-yudisium');
    }
}