<?php
namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function formpengajuanproposal()
    {
        return view('form-pengajuan-proposal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|in:A,B,C',
            'submission_date' => 'required|date',
            'script_title' => 'required|string|max:255',
            'abstract' => 'required|string',
        ]);

        Proposal::create($request->all());

        return redirect()->route('pengajuan-proposal')->with('success', 'Proposal submitted successfully!');
    }
}
