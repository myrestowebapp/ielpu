<x-admin-layout title="Impact Initiatives">
    <!-- Campaign Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center group hover:border-primary/20 transition-all">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary mr-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Live Campaigns</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['total_active'] }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center group hover:border-accent/20 transition-all">
            <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center text-accent mr-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Pending Review</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['pending_review'] }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center group hover:border-primary/20 transition-all">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary mr-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Fully Funded</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['total_funded'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Campaigns Grid -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-lg font-black text-gray-900 font-serif italic">Active Portfolios</h2>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Global Support Metrics</p>
        </div>
        <div class="flex space-x-2">
            <button class="px-5 py-2.5 bg-white border border-gray-100 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-50 transition-all">Filter</button>
            <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all">Initiate New Case</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($campaigns as $campaign)
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-xl hover:shadow-gray-200/50 transition-all">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <span class="px-3 py-1 bg-gray-50 text-gray-400 text-[8px] font-black uppercase tracking-widest rounded-lg italic">{{ $campaign->category->name ?? 'General' }}</span>
                        <span class="w-2 h-2 rounded-full {{ $campaign->status === 'approved' ? 'bg-primary' : 'bg-yellow-400' }}"></span>
                    </div>
                    <h3 class="text-md font-black text-gray-900 font-serif italic mb-2 leading-tight group-hover:text-primary transition-colors line-clamp-2">"{{ $campaign->title }}"</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-6">By {{ $campaign->user->name ?? 'Anonymous' }}</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest italic">Progress Tracking</span>
                            <span class="text-[10px] font-black text-gray-900 italic">{{ number_format(($campaign->amount_raised / $campaign->amount_required) * 100, 1) }}%</span>
                        </div>
                        <div class="w-full h-1.5 bg-gray-50 rounded-full overflow-hidden">
                            <div class="h-full bg-primary transition-all duration-1000" style="width: {{ ($campaign->amount_raised / $campaign->amount_required) * 100 }}%"></div>
                        </div>
                        <div class="flex items-center justify-between pt-2">
                            <div>
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest">Raised</p>
                                <p class="text-sm font-black text-gray-900">₹{{ number_format($campaign->amount_raised, 0) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest">Target</p>
                                <p class="text-sm font-black text-gray-900">₹{{ number_format($campaign->amount_required, 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-8 py-5 bg-gray-50/50 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest italic">Updated {{ $campaign->created_at->diffForHumans() }}</p>
                    <div class="flex space-x-2">
                        <button class="p-2 text-gray-400 hover:text-primary transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-accent transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(method_exists($campaigns, 'links'))
        <div class="mt-12 px-8 py-6 bg-white rounded-3xl border border-gray-100 shadow-sm">
            {{ $campaigns->links() }}
        </div>
    @endif
</x-admin-layout>
