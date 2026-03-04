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
        
        $stats = [
            'total_donations' => Donation::sum('amount'),
            'total_distributions' => Distribution::sum('amount'),
            'active_campaigns' => HelpRequest::where('status', 'approved')->count(),
            'total_beneficiaries' => User::where('role', 'beneficiary')->count(),
            'total_donors' => User::where('role', 'donor')->count(),
            'pending_verifications' => $pendingRequests->count(),
        ];

        $recentActivities = collect(); // Placeholder for actual activity log
        
        return view('admin.dashboard', compact('pendingRequests', 'approvedRequests', 'stats', 'recentActivities'));
    }

    // Module Placeholders
    public function users()
    {
        try {
            $users = User::paginate(15);
            $stats = [
                'total' => User::count(),
                'donors' => User::where('role', 'donor')->count(),
                'beneficiaries' => User::where('role', 'beneficiary')->count(),
                'admins' => User::where('role', 'admin')->count(),
            ];
        } catch (\Exception $e) {
            // Mock Data Fallback for Development
            $users = collect([
                new User(['name' => 'Aarav Sharma', 'email' => 'aarav@example.com', 'role' => 'donor', 'phone' => '+91 98765 43210', 'status' => 'active', 'created_at' => now()]),
                new User(['name' => 'Ishani Patel', 'email' => 'ishani@example.com', 'role' => 'beneficiary', 'phone' => '+91 87654 32109', 'status' => 'active', 'created_at' => now()->subDays(5)]),
                new User(['name' => 'Vihaan Gupta', 'email' => 'vihaan@example.com', 'role' => 'donor', 'phone' => '+91 76543 21098', 'status' => 'inactive', 'created_at' => now()->subMonths(1)]),
                new User(['name' => 'Deepika Reddy', 'email' => 'deepika@example.com', 'role' => 'admin', 'phone' => '+91 65432 10987', 'status' => 'active', 'created_at' => now()->subYears(1)]),
            ]);
            $stats = [
                'total' => 4,
                'donors' => 2,
                'beneficiaries' => 1,
                'admins' => 1,
            ];
        }

        return view('admin.users.index', compact('users', 'stats'));
    }
    public function donations()
    {
        try {
            $donations = Donation::with(['donor', 'helpRequest'])->latest()->paginate(15);
            $stats = [
                'total_amount' => Donation::sum('amount'),
                'avg_donation' => Donation::avg('amount') ?? 0,
                'total_count' => Donation::count(),
            ];
        } catch (\Exception $e) {
            // Mock Data Fallback
            $donations = collect([
                (object)[
                    'id' => 1,
                    'donor' => (object)['name' => 'Amit Kumar'],
                    'helpRequest' => (object)['title' => 'Emergency Heart Surgery'],
                    'amount' => 5000.00,
                    'transaction_id' => 'TXN_982341',
                    'created_at' => now()->subHours(2)
                ],
                (object)[
                    'id' => 2,
                    'donor' => (object)['name' => 'Sangeeta Rao'],
                    'helpRequest' => (object)['title' => 'Village Education Fund'],
                    'amount' => 12000.00,
                    'transaction_id' => 'TXN_982342',
                    'created_at' => now()->subHours(5)
                ],
                (object)[
                    'id' => 3,
                    'donor' => (object)['name' => 'Rahul Verma'],
                    'helpRequest' => (object)['title' => 'Clean Water Initiative'],
                    'amount' => 2500.00,
                    'transaction_id' => 'TXN_982343',
                    'created_at' => now()->subDays(1)
                ],
            ]);
            $stats = [
                'total_amount' => 19500.00,
                'avg_donation' => 6500.00,
                'total_count' => 3,
            ];
        }

        return view('admin.donations.index', compact('donations', 'stats'));
    }
    public function campaigns()
    {
        try {
            $campaigns = HelpRequest::with(['user', 'category'])->latest()->paginate(9);
            $stats = [
                'total_active' => HelpRequest::where('status', 'approved')->count(),
                'pending_review' => HelpRequest::where('status', 'pending')->count(),
                'total_funded' => HelpRequest::whereRaw('amount_raised >= amount_required')->count(),
            ];
        } catch (\Exception $e) {
            // Mock Data Fallback
            $campaigns = collect([
                (object)[
                    'id' => 1,
                    'title' => 'Emergency Heart Surgery for Child',
                    'user' => (object)['name' => 'Karan Mehra'],
                    'category' => (object)['name' => 'Medical'],
                    'amount_required' => 250000,
                    'amount_raised' => 185000,
                    'status' => 'approved',
                    'created_at' => now()->subDays(10)
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Higher Education for Rural Girls',
                    'user' => (object)['name' => 'NGO Alliance'],
                    'category' => (object)['name' => 'Education'],
                    'amount_required' => 500000,
                    'amount_raised' => 500000,
                    'status' => 'approved',
                    'created_at' => now()->subMonths(1)
                ],
                (object)[
                    'id' => 3,
                    'title' => 'Disaster Relief: Cyclone Support',
                    'user' => (object)['name' => 'Local Council'],
                    'category' => (object)['name' => 'Emergency'],
                    'amount_required' => 1000000,
                    'amount_raised' => 45000,
                    'status' => 'pending',
                    'created_at' => now()->subDays(2)
                ],
            ]);
            $stats = [
                'total_active' => 2,
                'pending_review' => 1,
                'total_funded' => 1,
            ];
        }

        return view('admin.campaigns.index', compact('campaigns', 'stats'));
    }
    public function content()
    {
        // Mock Data for Content Management
        $posts = collect([
            (object)[
                'id' => 1,
                'title' => 'The Future of Literacy: Our 2026 Strategy',
                'type' => 'blog',
                'status' => 'published',
                'author' => 'Admin Team',
                'created_at' => now()->subDays(5)
            ],
            (object)[
                'id' => 2,
                'title' => 'Emergency Alert: Cyclone Relief Initiative',
                'type' => 'announcement',
                'status' => 'published',
                'author' => 'Operations Head',
                'created_at' => now()->subHours(12)
            ],
            (object)[
                'id' => 3,
                'title' => 'Interview with a Beneficiary: A Journey of Hope',
                'type' => 'blog',
                'status' => 'draft',
                'author' => 'Storytelling Lead',
                'created_at' => now()->subDays(2)
            ],
        ]);

        $stats = [
            'total_posts' => $posts->count(),
            'published' => $posts->where('status', 'published')->count(),
            'drafts' => $posts->where('status', 'draft')->count(),
        ];

        return view('admin.content.index', compact('posts', 'stats'));
    }
    public function beneficiaries()
    {
        try {
            $beneficiaries = User::where('role', 'beneficiary')->with('helpRequests')->latest()->paginate(15);
            $stats = [
                'total' => User::where('role', 'beneficiary')->count(),
                'verified' => User::where('role', 'beneficiary')->where('status', 'active')->count(),
                'pending' => User::where('role', 'beneficiary')->where('status', 'active')->count(), // Placeholder logic
            ];
        } catch (\Exception $e) {
            // Mock Data Fallback
            $beneficiaries = collect([
                (object)[
                    'id' => 10,
                    'name' => 'Rajesh Kumar',
                    'email' => 'rajesh@example.com',
                    'phone' => '+91 98989 12345',
                    'status' => 'active',
                    'helpRequests' => collect([(object)['title' => 'Drought Relief Support']]),
                    'created_at' => now()->subMonths(3)
                ],
                (object)[
                    'id' => 11,
                    'name' => 'Meena Devi',
                    'email' => 'meena@example.com',
                    'phone' => '+91 98989 67890',
                    'status' => 'inactive',
                    'helpRequests' => collect([]),
                    'created_at' => now()->subDays(15)
                ],
            ]);
            $stats = [
                'total' => 2,
                'verified' => 1,
                'pending' => 1,
            ];
        }

        return view('admin.beneficiaries.index', compact('beneficiaries', 'stats'));
    }
    public function allocations()
    {
        try {
            $distributions = Distribution::with('helpRequest')->latest()->paginate(15);
            $stats = [
                'total_allocated' => Distribution::sum('amount'),
                'avg_allocation' => Distribution::avg('amount') ?? 0,
                'total_count' => Distribution::count(),
            ];
        } catch (\Exception $e) {
            // Mock Data Fallback
            $distributions = collect([
                (object)[
                    'id' => 100,
                    'helpRequest' => (object)['title' => 'Emergency Heart Surgery for Child'],
                    'amount' => 185000,
                    'date' => now()->subDays(2),
                    'notes' => 'Direct payment to hospital account for surgery prep.',
                    'created_at' => now()->subDays(2)
                ],
                (object)[
                    'id' => 101,
                    'helpRequest' => (object)['title' => 'Village Education Fund'],
                    'amount' => 50000,
                    'date' => now()->subDays(10),
                    'notes' => 'Distribution of school supplies and books.',
                    'created_at' => now()->subDays(10)
                ],
            ]);
            $stats = [
                'total_allocated' => 235000,
                'avg_allocation' => 117500,
                'total_count' => 2,
            ];
        }

        return view('admin.allocations.index', compact('distributions', 'stats'));
    }
    public function reports()
    {
        // Mock Data for Analytics
        $stats = [
            'monthly_revenue' => 450000,
            'impact_growth' => 12.5,
            'donor_retention' => 85,
            'top_categories' => [
                ['name' => 'Medical', 'value' => 45],
                ['name' => 'Education', 'value' => 30],
                ['name' => 'Emergency', 'value' => 25],
            ],
            'recent_trends' => [
                ['month' => 'Jan', 'amount' => 320000],
                ['month' => 'Feb', 'amount' => 450000],
            ]
        ];

        return view('admin.reports.index', compact('stats'));
    }
    public function settings()
    {
        // Mock Data for Settings
        $settings = [
            'org_name' => 'IELPU Charity Foundation',
            'org_email' => 'contact@ielpu.org',
            'stripe_status' => 'active',
            'currency' => 'INR',
            'verification_required' => true,
        ];

        return view('admin.settings.index', compact('settings'));
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
