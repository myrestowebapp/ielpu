<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;
use App\Models\Donation;
use App\Models\Distribution;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingRequests = HelpRequest::with(['user', 'category'])->where('status', 'pending')->get();
        $approvedRequests = HelpRequest::with(['user', 'category'])->where('status', 'approved')->get();
        $totalDonations = Donation::sum('amount');
        $totalDistributions = Distribution::sum('amount');
        
        return view('admin.dashboard', compact('pendingRequests', 'approvedRequests', 'totalDonations', 'totalDistributions'));
    }

    public function updateRequestStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,fulfilled'
        ]);

        $helpRequest = HelpRequest::findOrFail($id);
        $helpRequest->status = $validated['status'];
        $helpRequest->save();

        return redirect()->route('admin.dashboard')->with('success', "Request status updated to {$validated['status']}.");
    }

    public function storeDistribution(Request $request)
    {
        $validated = $request->validate([
            'help_request_id' => 'required|exists:help_requests,id',
            'amount' => 'required|numeric|min:1',
            'notes' => 'nullable|string',
            'date' => 'required|date'
        ]);

        Distribution::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Fund distribution recorded successfully and added to the Transparency Ledger.');
    }
}
