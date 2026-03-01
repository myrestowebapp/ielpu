<x-app-layout title="Home">
    <!-- Hero Section -->
    <div class="relative bg-genz-dark text-white overflow-hidden py-24 lg:py-32">
        <div class="absolute inset-0 z-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-genz-dark via-transparent to-genz-dark z-0"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/10 filter backdrop-blur-md border border-white/20 text-genz-cyan font-bold tracking-widest text-sm mb-6 uppercase">IELP Charity Trust</span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight mb-6 leading-tight">
                Rise Up. <br />
                <span class="gradient-text">Lift Others Higher.</span>
            </h1>
            <p class="text-lg md:text-2xl max-w-2xl mb-10 font-light text-gray-300">
                We're redefining humanity by connecting those who have with those who need. Real-time transparency, zero compromises. Watch exactly where your impact matters.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('public.requests') }}" class="bg-gradient-to-r from-genz-purple to-genz-pink text-white px-8 py-4 rounded-xl font-bold text-lg transition shadow-neon hover:scale-105 transform">Give Support ✨</a>
                <a href="/register" class="bg-white text-genz-dark border-2 border-transparent hover:border-genz-cyan px-8 py-4 rounded-xl font-bold text-lg transition shadow-brutal hover:bg-gray-50 transform">I Need Help 🤝</a>
            </div>
        </div>
    </div>

    <!-- Transparency Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div class="glass-panel rounded-2xl p-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center shadow-soft">
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-neon transition-shadow">
                <div class="w-12 h-12 rounded-full bg-genz-purple/10 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-genz-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-gray-500 font-bold uppercase tracking-wider text-xs mb-1">Total Impact Funded</p>
                <p class="text-3xl font-black text-genz-dark">₹{{ number_format($totalReceived, 2) }}</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-neon transition-shadow">
                 <div class="w-12 h-12 rounded-full bg-genz-cyan/10 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-genz-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <p class="text-gray-500 font-bold uppercase tracking-wider text-xs mb-1">Funds Distributed</p>
                <p class="text-3xl font-black text-genz-dark">₹{{ number_format($totalDistributed, 2) }}</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-neon transition-shadow">
                <div class="w-12 h-12 rounded-full bg-genz-pink/10 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-genz-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <p class="text-gray-500 font-bold uppercase tracking-wider text-xs mb-1">Active Cases</p>
                <p class="text-3xl font-black text-genz-dark">{{ \App\Models\HelpRequest::where('status', 'approved')->count() }}</p>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('public.ledger') }}" class="inline-flex items-center text-genz-purple font-bold hover:text-genz-pink transition flex items-center justify-center group">
                <span class="border-b-2 border-transparent group-hover:border-genz-pink pb-1 transition-colors">View 100% Transparent Ledger</span>
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>

    <!-- Recent Urgent Requests -->
    <div class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-genz-pink font-bold uppercase tracking-widest text-sm mb-2 block">Direct Impact</span>
                <h2 class="text-4xl font-black text-genz-dark md:text-5xl">urgent cases. <span class="bg-genz-yellow px-2 inline-block transform -rotate-2">real people.</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentRequests as $request)
                <div class="bg-white rounded-2xl border-2 border-genz-dark overflow-hidden flex flex-col transition-all shadow-brutal hover:-translate-y-2 hover:-translate-x-1 hover:shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] duration-200">
                    <div class="p-8 flex-grow">
                        <div class="flex items-center justify-between mb-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-genz-cyantext-genz-dark border-2 border-genz-dark">
                                {{ $request->category->name ?? 'General' }}
                            </span>
                            <span class="text-sm font-bold text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-genz-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $request->location }}
                            </span>
                        </div>
                        <h3 class="text-2xl font-black text-genz-dark mb-3 leading-tight">{{ $request->title }}</h3>
                        <p class="text-gray-600 mb-8 text-sm line-clamp-3 font-medium">{{ $request->description }}</p>
                        
                        <!-- Progress Bar -->
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm font-black mb-2">
                                <span class="text-genz-pink">₹{{ number_format($request->amount_raised) }} raised</span>
                                <span class="text-gray-400">of ₹{{ number_format($request->amount_required) }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-3 border border-gray-200 overflow-hidden">
                                @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                                <div class="bg-gradient-to-r from-genz-purple to-genz-pink h-full" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-5 bg-genz-dark mt-auto group">
                        <a href="{{ route('donations.create') }}" class="w-full flex items-center justify-center text-white font-black text-lg group-hover:text-genz-yellow transition-colors">
                            Help Them Now 
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-4xl">🕊️</span>
                    </div>
                    <h3 class="text-2xl font-black text-gray-400">No active cases right now.</h3>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-16">
                <a href="{{ route('public.requests') }}" class="inline-block bg-white border-2 border-genz-dark text-genz-dark font-black px-8 py-4 rounded-xl shadow-[4px_4px_0px_0px_rgba(15,23,42,1)] hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                    Explore All Cases
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
