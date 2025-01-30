<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanProposalController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function pengajuanproposal()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('pengajuan-proposal');
    }
}