<x-app-layout title="Transparency Ledger">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16">
            <span class="inline-block py-1.5 px-4 rounded-full bg-primary/10 text-primary font-bold tracking-wider text-[10px] uppercase mb-6">Real-time Accountability</span>
            <h1 class="text-5xl font-black text-gray-900 mb-6 font-serif italic">Transparency <span class="text-accent">Ledger.</span></h1>
            <p class="text-lg text-gray-500 max-w-3xl mx-auto font-medium italic leading-relaxed">We believe in absolute transparency. Every rupee donated and distributed is tracked and publicly available below for full accountability.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Incoming Donations -->
            <div>
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-black text-gray-900 font-serif italic flex items-center">
                        <span class="w-8 h-8 bg-primary/10 text-primary flex items-center justify-center rounded-lg mr-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </span>
                        Incoming Funds
                    </h2>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Pooled</span>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
                    <ul role="list" class="divide-y divide-gray-50">
                        @forelse($donations as $donation)
                        <li class="hover:bg-gray-50/50 transition-colors">
                            <div class="px-8 py-8">
                                <div class="flex items-center justify-between mb-3">
                                    <p class="text-lg font-black text-gray-900 font-serif italic">
                                        {{ $donation->donor ? $donation->donor->name : 'Anonymous Benefactor' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0">
                                        <p class="text-lg font-bold text-primary">
                                            +₹{{ number_format($donation->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                                        For: {{ $donation->helpRequest ? Str::limit($donation->helpRequest->title, 45) : 'General Impact Fund' }}
                                    </p>
                                    <p class="text-[10px] font-medium text-gray-300 uppercase">
                                        {{ $donation->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-8 py-16 text-center text-gray-400 font-medium italic">No incoming funds recorded yet.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-10">
                    {{ $donations->appends(['distributionsPage' => request('distributionsPage')])->links() }}
                </div>
            </div>

            <!-- Outgoing Distributions -->
            <div>
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-black text-gray-900 font-serif italic flex items-center">
                        <span class="w-8 h-8 bg-accent/10 text-accent flex items-center justify-center rounded-lg mr-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                        </span>
                        Distributions
                    </h2>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Impact Made</span>
                </div>

                <div class="bg-gray-900 rounded-2xl shadow-2xl overflow-hidden">
                    <ul role="list" class="divide-y divide-gray-800">
                        @forelse($distributions as $distribution)
                        <li class="hover:bg-gray-800/30 transition-colors">
                            <div class="px-8 py-8">
                                <div class="flex items-center justify-between mb-3">
                                    <p class="text-lg font-black text-white font-serif italic">
                                        {{ $distribution->helpRequest->title ?? 'Aid Initiative' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0">
                                        <p class="text-lg font-bold text-accent">
                                            -₹{{ number_format($distribution->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-xs font-medium text-gray-400 italic">
                                        {{ Str::limit($distribution->notes ?? 'Financial assistance provided', 65) }}
                                    </p>
                                    <p class="text-[10px] font-medium text-gray-500 uppercase">
                                        {{ $distribution->date->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-8 py-16 text-center text-gray-600 font-medium italic">No distributions recorded yet.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-10">
                    {{ $distributions->appends(['donationsPage' => request('donationsPage')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
