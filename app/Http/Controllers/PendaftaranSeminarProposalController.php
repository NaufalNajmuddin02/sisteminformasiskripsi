<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranSeminarProposalController extends Controller
{
    /**
     * Show the Proposal Skripsi page.
     *
     * @return \Illuminate\View\View
     */
    public function pendaftaranseminarproposal()
    {
        // Anda dapat menambahkan data ke view jika diperlukan
        return view('pendaftaran-seminar-proposal');
    }
}