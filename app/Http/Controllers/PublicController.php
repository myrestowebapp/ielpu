<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;
use App\Models\Donation;
use App\Models\Distribution;

class PublicController extends Controller
{
    public function index()
    {
        $totalReceived = Donation::sum('amount');
        $totalDistributed = Distribution::sum('amount');
        $recentRequests = HelpRequest::with('category')->where('status', 'approved')->orderBy('created_at', 'desc')->take(3)->get();
        
        return view('welcome', compact('totalReceived', 'totalDistributed', 'recentRequests'));
    }

    public function helpRequests(Request $request)
    {
        $query = HelpRequest::with(['category', 'user'])->where('status', 'approved');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('location') && $request->location != '') {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $requests = $query->paginate(9);
        $categories = \App\Models\Category::all();

        return view('help-requests', compact('requests', 'categories'));
    }

    public function ledger()
    {
        $donations = Donation::with(['donor', 'helpRequest'])->orderBy('created_at', 'desc')->paginate(15, ['*'], 'donationsPage');
        $distributions = Distribution::with(['helpRequest'])->orderBy('date', 'desc')->paginate(15, ['*'], 'distributionsPage');

        return view('ledger', compact('donations', 'distributions'));
    }
}
