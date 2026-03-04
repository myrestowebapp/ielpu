<x-app-layout title="About Us">
    <!-- Hero Section -->
    <div class="bg-gray-900 py-24 sm:py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black/50 z-10"></div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-primary rounded-full mix-blend-overlay filter blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent rounded-full mix-blend-overlay filter blur-[120px] opacity-20 -translate-x-1/4 translate-y-1/4"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block py-1.5 px-4 rounded-full bg-primary text-white font-semibold tracking-wider text-xs uppercase mb-6">Our Mission</span>
                <h2 class="text-5xl md:text-7xl font-black text-white mb-6 font-serif italic">
                    We Believe in a <span class="text-accent underline underline-offset-8 decoration-accent/30">Better World.</span>
                </h2>
                <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-300 font-medium leading-relaxed">
                    IELP is a transparent humanitarian platform dedicated to bridging the gap between donors taking action and beneficiaries needing hope. We don't just talk about change; we fund it directly.
                </p>
            </div>
        </div>
    </div>

    <!-- Impact Stats Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 mb-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 transition-all hover:-translate-y-1">
                <div class="w-14 h-14 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-gray-900 mb-2 font-serif italic">50,000+</h3>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Lives Impacted</p>
            </div>

            <div class="bg-primary p-10 rounded-2xl shadow-xl text-white transition-all hover:-translate-y-1">
                <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-6 backdrop-blur-md">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-black mb-2 font-serif italic text-white">100%</h3>
                <p class="text-white/80 font-bold uppercase tracking-widest text-xs">Transparent Verification</p>
            </div>

            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 transition-all hover:-translate-y-1">
                <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-gray-900 mb-2 font-serif italic">₹12M+</h3>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Funds Distributed</p>
            </div>
        </div>
    </div>

    <!-- Principles -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 font-serif italic leading-tight">Authentic Impact through <span class="text-accent">Direct Funding</span></h2>
                <div class="space-y-10">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 border-2 border-primary text-primary rounded-full flex items-center justify-center font-bold">01</div>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-xl font-bold text-gray-900">Radical Transparency</h4>
                            <p class="mt-2 text-gray-600 font-medium leading-relaxed">No hidden administrative fees. Every single rupee donated is publicly logged on our verified ledger for full accountability.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 border-2 border-primary text-primary rounded-full flex items-center justify-center font-bold">02</div>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-xl font-bold text-gray-900">Verified Requests</h4>
                            <p class="mt-2 text-gray-600 font-medium leading-relaxed">We verify every request. Once proven valid, donors can directly help beneficiaries in need of urgent life-saving medical care.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 border-2 border-primary text-primary rounded-full flex items-center justify-center font-bold">03</div>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-xl font-bold text-gray-900">Community Driven</h4>
                            <p class="mt-2 text-gray-600 font-medium leading-relaxed">Supported by Corporate Social Responsibility (CSR) funds like the Lulu Group and thousands of micro-donors stepping up.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gray-900 p-12 rounded-3xl text-white shadow-2xl relative z-10">
                    <h3 class="text-3xl font-black mb-6 font-serif italic text-primary-light">Join the Movement</h3>
                    <p class="mb-10 font-medium text-lg text-gray-300 leading-relaxed italic">Whether you are an organization needing to route CSR funds transparency or an individual looking to help your community—you belong here.</p>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-accent hover:bg-accent-dark text-white font-bold py-5 px-6 rounded-xl text-xl transition-all shadow-lg shadow-accent/20">
                        Become a Member
                    </a>
                </div>
                <div class="absolute -bottom-6 -right-6 w-full h-full bg-primary/10 rounded-3xl -z-0"></div>
            </div>
        </div>
    </div>
</x-app-layout>
