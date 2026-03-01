<x-app-layout title="Home">
    <!-- Hero Section -->
    <div class="relative bg-blue-700 text-white overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-30" src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Volunteers">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 flex flex-col items-center text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6">Transparency in Every Donation</h1>
            <p class="text-xl md:text-2xl max-w-3xl mb-10 font-light">IELP bridges the gap between those who want to help and those who need it most. See exactly where your contribution goes in real-time.</p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('public.requests') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-bold text-lg transition shadow-lg hover:-translate-y-1 transform">Donate Now</a>
                <a href="/register" class="bg-white text-blue-700 hover:bg-gray-100 px-8 py-3 rounded-full font-bold text-lg transition shadow-lg hover:-translate-y-1 transform">I Need Help</a>
            </div>
        </div>
    </div>

    <!-- Transparency Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
        <div class="bg-white rounded-xl shadow-xl p-8 grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-200">
            <div class="p-4">
                <p class="text-gray-500 font-semibold uppercase tracking-wide text-sm mb-2">Total Funds Received</p>
                <p class="text-4xl font-extrabold text-blue-600">${{ number_format($totalReceived, 2) }}</p>
            </div>
            <div class="p-4">
                <p class="text-gray-500 font-semibold uppercase tracking-wide text-sm mb-2">Total Funds Distributed</p>
                <p class="text-4xl font-extrabold text-teal-500">${{ number_format($totalDistributed, 2) }}</p>
            </div>
            <div class="p-4">
                <p class="text-gray-500 font-semibold uppercase tracking-wide text-sm mb-2">Active Help Requests</p>
                <p class="text-4xl font-extrabold text-orange-500">{{ \App\Models\HelpRequest::where('status', 'approved')->count() }}</p>
            </div>
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('public.ledger') }}" class="text-blue-600 font-semibold hover:underline flex items-center justify-center">
                View Full Transparency Ledger
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </div>

    <!-- Recent Urgent Requests -->
    <div class="bg-gray-50 py-20 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Urgent Cases Needing Support</h2>
                <p class="mt-4 text-xl text-gray-500">Your contribution can change a life today.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentRequests as $request)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition hover:shadow-xl transform hover:-translate-y-1">
                    <div class="p-6 flex-grow">
                        <div class="flex items-center justify-between mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $request->category->name ?? 'General' }}
                            </span>
                            <span class="text-sm text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $request->location }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $request->title }}</h3>
                        <p class="text-gray-600 mb-6 text-sm line-clamp-3">{{ $request->description }}</p>
                        
                        <!-- Progress Bar -->
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm font-medium mb-1">
                                <span class="text-teal-600">${{ number_format($request->amount_raised) }} raised</span>
                                <span class="text-gray-500">of ${{ number_format($request->amount_required) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                                @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                                <div class="bg-teal-500 h-2.5 rounded-full" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <a href="#" class="w-full block text-center text-orange-500 font-bold hover:text-orange-600 transition">Contribute Now</a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12 text-gray-500">
                    No active requests at the moment.
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('public.requests') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition focus:outline-none">
                    View All Requests
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
