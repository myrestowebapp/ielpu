<x-app-layout title="Transparency Ledger">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <span class="text-genz-cyan font-bold uppercase tracking-widest text-sm mb-2 block">100% Verifiable</span>
            <h1 class="text-5xl font-black text-genz-dark mb-4">Transparency <span class="bg-genz-pink text-white px-2 inline-block transform rotate-1">Ledger</span></h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-medium">We believe in absolute transparency. Every rupee donated and distributed is tracked and publicly available below.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Incoming Donations -->
            <div>
                <h2 class="text-3xl font-black text-genz-dark mb-8 flex items-center">
                    <span class="w-10 h-10 bg-genz-purple text-white flex items-center justify-center rounded-xl mr-4 shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] border-2 border-genz-dark">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    </span>
                    Incoming Funds
                </h2>
                <div class="bg-white rounded-2xl border-2 border-genz-dark shadow-brutal overflow-hidden">
                    <ul role="list" class="divide-y-2 divide-genz-dark">
                        @forelse($donations as $donation)
                        <li class="hover:bg-gray-50 transition-colors">
                            <div class="px-6 py-6 sm:px-8">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-lg font-black text-genz-purple truncate">
                                        {{ $donation->donor ? $donation->donor->name : 'Anonymous Angel' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-3 py-1 inline-flex text-sm font-bold rounded-full bg-genz-cyan text-genz-dark border-2 border-genz-dark shadow-[1px_1px_0px_0px_rgba(15,23,42,1)]">
                                            +₹{{ number_format($donation->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm font-bold text-gray-600">
                                            For: {{ $donation->helpRequest ? Str::limit($donation->helpRequest->title, 40) : 'General Impact Fund' }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-xs font-bold text-gray-400 sm:mt-0 uppercase tracking-wider">
                                        <p>{{ $donation->created_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-4 py-12 text-center text-gray-500 font-bold">No incoming funds recorded yet. Let's change that! 🚀</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-8">
                    {{ $donations->appends(['distributionsPage' => request('distributionsPage')])->links() }}
                </div>
            </div>

            <!-- Outgoing Distributions -->
            <div>
                <h2 class="text-3xl font-black text-genz-dark mb-8 flex items-center">
                    <span class="w-10 h-10 bg-genz-pink text-white flex items-center justify-center rounded-xl mr-4 shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] border-2 border-genz-dark">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"></path></svg>
                    </span>
                    Distributions
                </h2>
                <div class="bg-genz-yellow/20 rounded-2xl border-2 border-genz-dark shadow-brutal overflow-hidden">
                    <ul role="list" class="divide-y-2 divide-genz-dark">
                        @forelse($distributions as $distribution)
                        <li class="hover:bg-genz-yellow/30 transition-colors">
                            <div class="px-6 py-6 sm:px-8">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-lg font-black text-genz-dark truncate">
                                        {{ $distribution->helpRequest->title ?? 'Unknown Impact Case' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-3 py-1 inline-flex text-sm font-bold rounded-full bg-genz-pink text-white border-2 border-genz-dark shadow-[1px_1px_0px_0px_rgba(15,23,42,1)]">
                                            -₹{{ number_format($distribution->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm font-medium text-gray-700 italic border-l-2 border-genz-pink pl-2">
                                            {{ Str::limit($distribution->notes ?? 'Financial assistance successfully provided', 60) }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-xs font-bold text-gray-500 sm:mt-0 uppercase tracking-wider">
                                        <p>{{ $distribution->date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-4 py-12 text-center text-gray-600 font-bold">No distributions recorded yet. We're currently reviewing cases. 🕊️</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-8">
                    {{ $distributions->appends(['donationsPage' => request('donationsPage')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
