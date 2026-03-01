<x-app-layout title="Home">
    <!-- Portfolio: Hero Section -->
    <section class="relative bg-genz-dark text-white min-h-[90vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- GenZ blob gradients -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-genz-purple rounded-full mix-blend-multiply filter blur-3xl opacity-40 translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-genz-cyan rounded-full mix-blend-multiply filter blur-3xl opacity-30 -translate-x-1/4 translate-y-1/4"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block py-2 px-4 bg-genz-yellow text-genz-dark font-black tracking-widest text-xs uppercase mb-6 rounded-xl shadow-[4px_4px_0px_0px_rgba(236,72,153,1)] border-2 border-genz-dark transform -rotate-2">A New Era of Philanthropy</span>
                
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter mb-6 leading-none drop-shadow-[4px_4px_0px_rgba(236,72,153,1)]">
                    Impact <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-genz-cyan to-genz-yellow">Unleashed.</span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-10 font-bold text-gray-300 max-w-lg leading-relaxed border-l-4 border-genz-pink pl-6">
                    We are building a trustless, 100% transparent ecosystem where your money directly funds those in critical need. No corporate black boxes. Just real human impact.
                </p>
                
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('public.requests') }}" class="bg-genz-pink text-white border-4 border-genz-dark px-8 py-4 rounded-2xl font-black text-xl text-center shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[4px] hover:translate-y-[4px] transition-all uppercase tracking-widest">
                        Support A Cause
                    </a>
                    <a href="#mission" class="bg-transparent text-white border-4 border-white px-8 py-4 rounded-2xl font-black text-xl text-center hover:bg-white hover:text-genz-dark transition-all uppercase tracking-widest">
                        Read Manifesto
                    </a>
                </div>
            </div>
            
            <!-- Graphic Element -->
            <div class="hidden lg:block relative">
                <div class="absolute inset-0 bg-genz-cyan transform rotate-3 rounded-3xl border-4 border-genz-dark shadow-[12px_12px_0px_0px_rgba(15,23,42,1)]"></div>
                <!-- A placeholder image or graphic grid for the portfolio style -->
                <div class="relative bg-white p-6 rounded-3xl border-4 border-genz-dark h-96 flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div class="bg-genz-yellow px-3 py-1 font-black text-genz-dark border-2 border-genz-dark rounded-lg text-sm uppercase transform -rotate-3">Live Mission Stats</div>
                        <div class="w-4 h-4 rounded-full bg-genz-pink animate-pulse"></div>
                    </div>
                    
                    <div class="space-y-4 font-black text-genz-dark uppercase tracking-widest text-2xl">
                        <div class="flex justify-between border-b-2 border-gray-200 pb-2">
                            <span>Donations</span> <span class="text-genz-purple text-right">Encrypted</span>
                        </div>
                        <div class="flex justify-between border-b-2 border-gray-200 pb-2">
                            <span>Admin Fees</span> <span class="text-genz-pink text-right">0.00%</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Transparency</span> <span class="text-genz-cyan text-right">100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio: The Mission Manifesto -->
    <section id="mission" class="py-24 bg-white border-b-4 border-genz-dark relative overflow-hidden">
        <div class="absolute text-[20rem] font-black top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gray-50 opacity-50 z-0 pointer-events-none whitespace-nowrap">MANIFESTO</div>
        
        <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
            <h2 class="text-5xl md:text-6xl font-black text-genz-dark mb-12 uppercase">The System is <span class="text-genz-pink border-b-8 border-genz-pink">Broken.</span></h2>
            
            <p class="text-2xl md:text-3xl font-bold text-gray-800 leading-relaxed mb-8">
                Traditional charities swallow your donations in administrative fees and opaque corporate structures. 
            </p>
            <p class="text-2xl md:text-3xl font-bold text-gray-500 leading-relaxed bg-genz-yellow p-4 rounded-xl inline-block transform -rotate-1 border-2 border-genz-dark text-genz-dark">
                We built IELP to bypass the noise.
            </p>
            <p class="text-xl text-gray-600 mt-12 max-w-2xl mx-auto font-medium">
                Our mission is simple: Connect those with capacity directly to those in crisis. Whether it's a life-saving medical procedure or emergency disaster relief, we verify the need and let the community fund the solution directly.
            </p>
        </div>
    </section>

    <!-- Portfolio: Transparency Dashboard -->
    <section class="py-24 bg-genz-purple relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div>
                    <h2 class="text-5xl md:text-7xl font-black text-white uppercase drop-shadow-[4px_4px_0px_rgba(15,23,42,1)]">The Ledger.</h2>
                    <p class="text-xl text-genz-yellow font-bold mt-4 uppercase tracking-widest">Real-time impact tracking</p>
                </div>
                <a href="{{ route('public.ledger') }}" class="mt-6 md:mt-0 bg-white text-genz-dark border-4 border-genz-dark px-6 py-3 rounded-xl font-black text-lg shadow-[4px_4px_0px_0px_rgba(255,255,255,0.5)] hover:bg-genz-yellow transition-colors uppercase">
                    View Full Ledger &rarr;
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <!-- Metric 1 -->
                <div class="bg-white p-10 rounded-3xl border-4 border-genz-dark shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] transform hover:-translate-y-2 transition-transform">
                    <p class="text-gray-500 font-black uppercase tracking-widest text-sm mb-4">Total Impact Funded</p>
                    <p class="text-5xl md:text-6xl font-black text-genz-dark text-transparent bg-clip-text bg-gradient-to-r from-genz-dark to-genz-purple">₹{{ number_format($totalReceived, 2) }}</p>
                </div>
                
                <!-- Metric 2 -->
                <div class="bg-genz-pink p-10 rounded-3xl border-4 border-genz-dark shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] transform hover:-translate-y-2 transition-transform">
                    <p class="text-white font-black uppercase tracking-widest text-sm mb-4">Funds Distributed</p>
                    <p class="text-5xl md:text-6xl font-black text-white drop-shadow-[2px_2px_0px_rgba(15,23,42,1)]">₹{{ number_format($totalDistributed, 2) }}</p>
                </div>
                
                <!-- Metric 3 -->
                <div class="bg-genz-cyan p-10 rounded-3xl border-4 border-genz-dark shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] transform hover:-translate-y-2 transition-transform">
                    <p class="text-genz-dark font-black uppercase tracking-widest text-sm mb-4">Active Cases</p>
                    <p class="text-5xl md:text-6xl font-black text-genz-dark">
                        {{ \App\Models\HelpRequest::where('status', 'approved')->count() }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio: Focus Areas -->
    <section class="py-24 bg-gray-50 border-t-4 border-b-4 border-genz-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-5xl md:text-7xl font-black text-center text-genz-dark uppercase mb-20">Where we <span class="text-genz-pink">Focus.</span></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white p-12 border-4 border-genz-dark rounded-3xl shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-genz-pink rounded-bl-full flex items-center justify-center -mr-4 -mt-4 transition-transform group-hover:scale-110">
                        <span class="text-4xl text-white ml-4 mt-4">🏥</span>
                    </div>
                    <h3 class="text-3xl font-black text-genz-dark uppercase mb-4">Medical Emergencies</h3>
                    <p class="text-lg text-gray-600 font-medium mb-8">Access to life-saving surgeries, expensive ongoing treatments, and critical care shouldn't depend on your bank balance. We intervene when time and money are running out.</p>
                </div>
                
                <div class="bg-genz-dark p-12 border-4 border-genz-cyan rounded-3xl shadow-[8px_8px_0px_0px_rgba(6,182,212,1)] relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-genz-cyan rounded-bl-full flex items-center justify-center -mr-4 -mt-4 transition-transform group-hover:scale-110">
                        <span class="text-4xl text-genz-dark ml-4 mt-4">🌪️</span>
                    </div>
                    <h3 class="text-3xl font-black text-white uppercase mb-4">Natural Calamities</h3>
                    <p class="text-lg text-gray-300 font-medium mb-8">When floods, earthquakes, or fires destroy livelihoods, the immediate aftermath requires rapid financial deployment to rebuild homes and restart lives.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio: Active Cases Showcase -->
    <section class="py-24 bg-white relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 2px 2px, black 1px, transparent 0); background-size: 32px 32px;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center mb-16">
                <span class="bg-genz-dark text-white font-black tracking-widest text-sm py-1 px-4 rounded-full uppercase mb-4">Direct Impact Directory</span>
                <h2 class="text-5xl md:text-6xl font-black text-genz-dark uppercase">They need you <span class="bg-genz-yellow px-2 inline-block transform rotate-2">Right Now.</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentRequests as $request)
                <div class="bg-white rounded-3xl border-4 border-genz-dark overflow-hidden flex flex-col transition-all shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] hover:-translate-y-2 hover:-translate-x-1 hover:shadow-[12px_12px_0px_0px_rgba(15,23,42,1)] duration-300">
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                            <span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest bg-genz-cyan text-genz-dark border-2 border-genz-dark">
                                {{ $request->category->name ?? 'General' }}
                            </span>
                        </div>
                        
                        <h3 class="text-2xl font-black text-genz-dark mb-4 leading-tight uppercase">{{ $request->title }}</h3>
                        <p class="text-gray-600 mb-8 text-sm line-clamp-3 font-medium flex-grow">{{ $request->description }}</p>
                        
                        <!-- Progress Bar Container -->
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm font-black uppercase tracking-widest mb-2">
                                <span class="text-genz-pink">₹{{ number_format($request->amount_raised) }} Raised</span>
                                <span class="text-gray-400">Goal: ₹{{ number_format($request->amount_required) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-4 border-2 border-genz-dark overflow-hidden">
                                @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                                <div class="bg-gradient-to-r from-genz-purple to-genz-pink h-full relative" style="width: {{ $percent }}%">
                                    <div class="absolute inset-0 bg-white/20" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.2) 10px, rgba(255,255,255,0.2) 20px);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-5 border-t-4 border-genz-dark bg-gray-50 group hover:bg-genz-yellow transition-colors cursor-pointer" onclick="window.location='{{ route('donations.create') }}'">
                        <div class="w-full flex items-center justify-between text-genz-dark font-black text-xl uppercase tracking-widest">
                            Fund Case 
                            <svg class="w-6 h-6 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-24 border-4 border-dashed border-gray-300 rounded-3xl">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-5xl">🕊️</div>
                    <h3 class="text-3xl font-black text-gray-400 uppercase tracking-widest">No Active Crises</h3>
                    <p class="text-gray-500 mt-2 font-bold max-w-md mx-auto">The community has fully funded all current requests. Check back soon for new opportunities to impact lives.</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-20">
                <a href="{{ route('public.requests') }}" class="inline-block bg-genz-dark text-white font-black text-xl uppercase tracking-widest px-10 py-5 rounded-2xl shadow-[6px_6px_0px_0px_rgba(236,72,153,1)] hover:shadow-none hover:translate-x-[6px] hover:translate-y-[6px] transition-all border-4 border-genz-dark">
                    Explore All Open Cases
                </a>
            </div>
        </div>
    </section>

    <!-- Portfolio Footer CTA -->
    <section class="py-32 bg-gradient-to-b from-white to-genz-yellow border-t-4 border-genz-dark relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-6xl md:text-8xl font-black text-genz-dark uppercase tracking-tighter leading-none mb-8 drop-shadow-[4px_4px_0px_rgba(255,255,255,1)]">
                Build the <br>
                <span class="text-genz-purple italic">Future</span> Now.
            </h2>
            <p class="text-2xl font-bold text-gray-800 mb-12 max-w-2xl mx-auto">
                No middlemen. No red tape. Become a donor, a beneficiary, or a CSR ambassador today.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-8">
                <a href="{{ route('register') }}" class="w-full sm:w-auto text-center bg-genz-cyan text-genz-dark font-black text-2xl uppercase tracking-widest px-12 py-6 rounded-2xl shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] hover:shadow-none hover:translate-x-[8px] hover:translate-y-[8px] transition-all border-4 border-genz-dark">
                    Join Waitlist
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
