<?php
namespace App\Http\Controllers\skripsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumpulanBerkasAkhirController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function pengumpulanberkasakhir()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('skripsi.pengumpulan-berkas-akhir');
    }
}