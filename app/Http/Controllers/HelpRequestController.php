<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HelpRequestController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('help-requests.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount_required' => 'required|numeric|min:1',
            'location' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';
        $validated['amount_raised'] = 0;

        HelpRequest::create($validated);

        return redirect()->route('home')->with('success', 'Your request has been submitted and is pending verification.');
    }
}
