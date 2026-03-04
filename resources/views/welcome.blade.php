<x-app-layout title="Home">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white min-h-[85vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black/60 z-10"></div>
            <!-- Professional overlay with primary/accent hints -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary rounded-full mix-blend-overlay filter blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-accent rounded-full mix-blend-overlay filter blur-[120px] opacity-20 -translate-x-1/4 translate-y-1/4"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20">
            <div class="max-w-3xl">
                <span class="inline-block py-1.5 px-4 bg-primary text-white font-semibold tracking-wider text-xs uppercase mb-6 rounded-full">Empowering Communities Since 2024</span>
                
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight font-serif italic text-white">
                    We Rise By <br />
                    <span class="text-accent italic">Lifting Others</span>
                </h1>
                
                <p class="text-lg md:text-xl mb-10 text-gray-300 max-w-2xl leading-relaxed">
                    IELP is a dedicated ecosystem where your contributions directly fuel life-saving medical procedures and emergency infrastructure for those in crisis. Built on 100% transparency.
                </p>
                
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('public.requests') }}" class="bg-accent hover:bg-accent-dark text-white px-10 py-4 rounded-xl font-bold text-lg text-center transition-all shadow-lg hover:shadow-accent/40">
                        Donate Now
                    </a>
                    <a href="#mission" class="bg-transparent text-white border-2 border-white/30 px-10 py-4 rounded-xl font-bold text-lg text-center hover:bg-white/10 transition-all backdrop-blur-sm">
                        Our Mission
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Sections -->
    <section id="mission" class="relative z-30 -mt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="bg-accent p-12 text-white">
                    <h2 class="text-3xl font-serif font-black mb-6 italic">Welcome to Charity Info</h2>
                    <p class="text-lg opacity-90 leading-relaxed mb-8 font-medium">
                        Dedicated to alleviating poverty, providing essential education, and offering healthcare to those in need. We are building a trustless, transparent environment.
                    </p>
                    <a href="{{ route('about') }}" class="inline-block border-2 border-white/40 hover:bg-white hover:text-accent px-8 py-3 rounded-lg font-bold transition-all uppercase tracking-wider text-sm">More Info</a>
                </div>
                <div class="bg-gray-900 p-12 text-white border-l border-gray-800">
                    <h2 class="text-3xl font-serif font-black mb-6 italic text-primary-light">Current Fundraising Status</h2>
                    <p class="text-lg opacity-80 mb-8 font-medium">Every contribution you make is recorded on our transparent ledger. Track exactly where your money goes.</p>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-bold uppercase tracking-widest text-gray-400">Total Goal Reached</span>
                                <span class="text-sm font-bold text-primary-light italic">₹{{ number_format($totalDistributed) }} / ₹{{ number_format($totalReceived) }}</span>
                            </div>
                            <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden">
                                @php $total_percent = $totalReceived > 0 ? ($totalDistributed / $totalReceived) * 100 : 0; @endphp
                                <div class="bg-primary h-full rounded-full" style="width: {{ $total_percent }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features / Support Area -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-serif font-black text-gray-900 mb-8 italic">Welcome <span class="text-accent underline decoration-accent/30 underline-offset-8">About Us</span></h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-10 font-medium">
                        Our platform bypasses traditional administrative overhead. We verify every request through a rigorous field partner network to ensure your impact is immediate and authentic.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                        @php $features = ['Medical Support', 'Disaster Relief', 'Transparent Ledger', 'Community Funded', 'Direct Impact', 'Verified Requests']; @endphp
                        @foreach($features as $f)
                        <div class="flex items-center space-x-3 text-gray-700">
                            <span class="text-primary font-bold">✓</span>
                            <span class="font-semibold">{{ $f }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <a href="{{ route('about') }}" class="bg-accent text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-accent/20 hover:-translate-y-1 transition-all inline-block">Learn More</a>
                </div>
                
                <div class="grid grid-cols-2 gap-6">
                    @php 
                    $cards = [
                        ['title' => 'Scholarship', 'icon' => '🎓'],
                        ['title' => 'Helping Hand', 'icon' => '🤝'],
                        ['title' => 'Medical Care', 'icon' => '🏥'],
                        ['title' => 'Crisis Relief', 'icon' => '🆘']
                    ];
                    @endphp
                    @foreach($cards as $card)
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:border-primary/30 transition-all hover:bg-white hover:shadow-xl group">
                        <div class="text-4xl mb-4 grayscale group-hover:grayscale-0 transition-all">{{ $card['icon'] }}</div>
                        <h3 class="text-xl font-serif font-black italic mb-2">{{ $card['title'] }}</h3>
                        <p class="text-sm text-gray-500 font-medium leading-relaxed">Providing direct support to individuals in need.</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="py-24 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#15803d 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <div class="text-4xl md:text-5xl font-black text-primary-light mb-2">1,200+</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-gray-400">Lives Impacted</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-accent-light mb-2">₹{{ number_format($totalReceived/1000) }}k</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-gray-400">Total Donations</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-primary-light mb-2">50+</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-gray-400">Active Partners</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-accent-light mb-2">100%</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-gray-400">Transparency</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Posts / Active Cases -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl font-serif font-black text-gray-900 italic mb-4">They Need <span class="text-accent">Support</span></h2>
                    <p class="text-lg text-gray-500 font-medium italic">Active cases requiring community funding right now.</p>
                </div>
                <a href="{{ route('public.requests') }}" class="text-primary font-bold hover:text-accent transition-all flex items-center space-x-2 border-b-2 border-primary/20 pb-1">
                    <span>View All Cases</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @forelse($recentRequests as $request)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 transition-all hover:shadow-2xl hover:border-primary/20 flex flex-col h-full group">
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-6">
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest">{{ $request->category->name ?? 'Help Case' }}</span>
                            <span class="text-accent font-serif italic font-bold">In Need</span>
                        </div>
                        
                        <h3 class="text-2xl font-serif font-black text-gray-900 mb-4 leading-tight italic">{{ $request->title }}</h3>
                        <p class="text-gray-500 mb-8 text-sm line-clamp-3 font-medium flex-grow">{{ $request->description }}</p>
                        
                        <!-- Mini Progress -->
                        <div class="mt-auto pt-6 border-t border-gray-50">
                            <div class="flex justify-between text-xs font-bold uppercase tracking-widest mb-2">
                                <span class="text-primary">₹{{ number_format($request->amount_raised) }} Raised</span>
                                <span class="text-gray-400">Goal: ₹{{ number_format($request->amount_required) }}</span>
                            </div>
                            <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                                @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                                <div class="bg-primary h-full rounded-full transition-all duration-1000" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 group-hover:bg-primary transition-colors">
                        <a href="{{ route('donations.create') }}" class="block text-center text-primary-dark group-hover:text-white font-bold uppercase tracking-wider text-sm transition-all">Support This Case</a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                    <p class="text-2xl font-serif font-black text-gray-300 italic">No Active Cases Available</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="py-24 bg-primary text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white"></path>
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <h2 class="text-4xl md:text-6xl font-serif font-black italic mb-8 leading-tight">Every Gesture Matters. <br> Help Us <span class="text-accent-light underline decoration-accent-light/30">Heal Lives.</span></h2>
            <p class="text-xl opacity-90 mb-12 max-w-2xl mx-auto font-medium leading-relaxed italic">
                Join our community of donors and volunteers committed to creating a world where no medical crisis goes unfunded.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-8">
                <a href="{{ route('register') }}" class="bg-white text-primary px-12 py-5 rounded-xl font-black text-lg shadow-xl hover:-translate-y-1 transition-all">
                    Get Involved Today
                </a>
            </div>
        </div>
    </section>
</x-app-layout>

