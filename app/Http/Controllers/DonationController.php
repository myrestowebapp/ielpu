<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function create(Request $request)
    {
        $helpRequest = null;
        if ($request->has('request_id')) {
            $helpRequest = HelpRequest::findOrFail($request->request_id);
        }
        
        return view('donations.create', compact('helpRequest'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'help_request_id' => 'nullable|exists:help_requests,id',
            'is_anonymous' => 'nullable|boolean'
        ]);

        $donation = new Donation();
        $donation->amount = $validated['amount'];
        $donation->donor_id = isset($validated['is_anonymous']) && $validated['is_anonymous'] ? null : Auth::id();
        $donation->help_request_id = $validated['help_request_id'] ?? null;
        $donation->transaction_id = 'TXN-' . Str::upper(Str::random(10)); // Simulated transaction ID
        $donation->save();

        if ($donation->help_request_id) {
            $helpRequest = HelpRequest::find($donation->help_request_id);
            $helpRequest->amount_raised += $donation->amount;
            
            if ($helpRequest->amount_raised >= $helpRequest->amount_required) {
                $helpRequest->status = 'fulfilled';
            }
            $helpRequest->save();
        }

        return redirect()->route('public.ledger')->with('success', 'Thank you for your generous donation!');
    }
}
