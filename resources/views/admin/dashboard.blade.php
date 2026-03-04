<x-admin-layout title="Dashboard Overview">
    @if (session('success'))
        <div class="mb-8 flex items-center p-4 bg-primary/5 border border-primary/10 rounded-2xl">
            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <p class="ml-3 text-sm font-bold text-primary italic">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Total Revenue</span>
            </div>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none">₹{{ number_format($stats['total_donations'], 2) }}</h3>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">Historical Donations</p>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center text-accent group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Impact Funds</span>
            </div>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none">₹{{ number_format($stats['total_distributions'], 2) }}</h3>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">Total Distributed</p>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Campaigns</span>
            </div>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none">{{ $stats['active_campaigns'] }}</h3>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">Active Impact Cases</p>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center text-accent group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Community</span>
            </div>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none">{{ $stats['total_donors'] + $stats['total_beneficiaries'] }}</h3>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">Total Participants</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Management Area -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Pending Verifications -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="bg-gray-50/50 px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-black text-gray-900 font-serif italic">Verification Queue</h2>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Needs Approval</p>
                    </div>
                    <span class="px-3 py-1 bg-accent/10 text-accent text-[10px] font-black uppercase tracking-widest rounded-full italic">{{ $stats['pending_verifications'] }} Pending</span>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($pendingRequests as $req)
                        <div class="p-8 hover:bg-gray-50 transition-all group">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 mr-4 font-serif italic font-black">
                                        {{ substr($req->category->name ?? '?', 0, 1) }}
                                    </div>
                                    <div>
                                        <h3 class="text-md font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $req->title }}</h3>
                                        <p class="text-[10px] text-gray-400 font-bold mt-1">By {{ $req->user->name ?? 'Anonymous' }} • {{ $req->location }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-black text-gray-900">₹{{ number_format($req->amount_required, 2) }}</p>
                                    <p class="text-[10px] text-accent font-bold uppercase tracking-widest mt-1 italic">{{ $req->category->name ?? 'General' }}</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 italic mb-6 leading-relaxed line-clamp-2">"{{ $req->description }}"</p>
                            <div class="flex items-center space-x-3">
                                <form action="{{ route('admin.requests.status', $req->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="px-6 py-2.5 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">Verify Case</button>
                                </form>
                                <form action="{{ route('admin.requests.status', $req->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="px-6 py-2.5 bg-white border border-gray-200 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-red-50 hover:text-red-500 hover:border-red-100 transition-all">Dismiss</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="px-8 py-20 text-center">
                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-200 mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <p class="text-sm font-bold text-gray-300 uppercase tracking-widest italic">All cases are verified</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Distribution Form -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="bg-gray-50/50 px-8 py-6 border-b border-gray-100">
                    <h2 class="text-lg font-black text-gray-900 font-serif italic">Fund Allocation</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Execute Distribution</p>
                </div>
                <div class="p-10">
                    <form action="{{ route('admin.distributions.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="space-y-2">
                             <label for="help_request_id" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Select Active Campaign</label>
                             <select id="help_request_id" name="help_request_id" required class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-4 px-5 font-serif italic text-sm focus:border-primary focus:ring-0 transition-all cursor-pointer">
                                <option value="">Choose a verified case...</option>
                                @foreach($approvedRequests as $req)
                                    <option value="{{ $req->id }}">{{ $req->title }} (Remaining Needed: ₹{{ number_format($req->amount_required - $req->amount_raised, 2) }})</option>
                                @endforeach
                             </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="amount" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Distribution Amount (INR)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                        <span class="text-primary font-bold text-lg">₹</span>
                                    </div>
                                    <input type="number" name="amount" id="amount" min="1" step="0.01" required placeholder="0.00" class="block w-full pl-10 py-4 bg-gray-50/50 border border-gray-100 rounded-xl focus:border-primary focus:ring-0 transition-all font-black text-lg">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="date" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Allocation Date</label>
                                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" required class="block w-full py-4 px-5 bg-gray-50/50 border border-gray-100 rounded-xl font-serif italic text-sm focus:border-primary focus:ring-0 transition-all">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="notes" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Transaction Documentation</label>
                            <textarea id="notes" name="notes" rows="4" placeholder="Detail the transaction or add receipt reference..." class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-4 px-5 italic text-sm text-gray-700 focus:border-primary focus:ring-0 transition-all"></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-5 bg-gray-900 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-black transition-all shadow-xl shadow-gray-200">Record Allocation Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Activity/Actions -->
        <div class="space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                <h2 class="text-md font-black text-gray-900 font-serif italic mb-6">Action Hub</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.campaigns') }}" class="flex items-center p-4 bg-gray-50 rounded-2xl hover:bg-primary/5 hover:text-primary transition-all group">
                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="text-xs font-black uppercase tracking-widest">New Campaign</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center p-4 bg-gray-50 rounded-2xl hover:bg-accent/5 hover:text-accent transition-all group">
                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        </div>
                        <span class="text-xs font-black uppercase tracking-widest">Register User</span>
                    </a>
                    <a href="{{ route('admin.reports') }}" class="flex items-center p-4 bg-gray-50 rounded-2xl hover:bg-primary/5 hover:text-primary transition-all group">
                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="text-xs font-black uppercase tracking-widest">Audit Ledger</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity Placeholder -->
            <div class="bg-gray-900 rounded-3xl shadow-xl p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full filter blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                <h2 class="text-md font-black font-serif italic mb-6 relative z-10">Live Intelligence</h2>
                <div class="space-y-6 relative z-10">
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-primary mt-1.5 mr-4 ring-4 ring-primary/20 animate-pulse"></div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Audit Log</p>
                            <p class="text-xs text-white/90 italic font-serif">System infrastructure ready. No critical errors detected in transparency layer.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10 pt-6 border-t border-white/5 relative z-10">
                    <p class="text-[8px] font-bold text-gray-600 uppercase tracking-[0.2em]">Security Protocol v4.0 Active</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

