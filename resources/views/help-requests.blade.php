<x-app-layout title="Help Requests">
    <div class="bg-gradient-to-r from-genz-dark via-[#1e1b4b] to-genz-dark pb-24 pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-black mb-4 tracking-tight">Support a <span class="bg-genz-cyan text-genz-dark px-2 transform -rotate-1 inline-block">Cause</span></h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light leading-relaxed">Browse verified requests for assistance and make a direct impact where it's needed most.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <!-- Filters -->
        <div class="bg-white rounded-2xl shadow-brutal border-2 border-genz-dark p-6 mb-12">
            <form action="{{ route('public.requests') }}" method="GET" class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <label for="category" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Category</label>
                    <select name="category_id" id="category" class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-genz-purple focus:ring-0 py-3 px-4 font-medium transition-colors">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="location" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Location</label>
                    <input type="text" name="location" id="location" value="{{ request('location') }}" placeholder="Search by city or region..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-genz-purple focus:ring-0 py-3 px-4 font-medium transition-colors">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-genz-dark text-white px-8 py-3 rounded-xl font-black transition-all shadow-[4px_4px_0px_0px_rgba(139,92,246,1)] hover:shadow-[2px_2px_0px_0px_rgba(139,92,246,1)] hover:translate-x-[2px] hover:translate-y-[2px] w-full md:w-auto uppercase tracking-wider border-2 border-genz-dark">Filter</button>
                    @if(request()->has('category_id') || request()->has('location'))
                        <a href="{{ route('public.requests') }}" class="ml-4 text-gray-400 hover:text-genz-pink self-center mb-3 font-bold transition-colors">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($requests as $request)
            <div class="bg-white rounded-2xl border-2 border-genz-dark overflow-hidden flex flex-col transition-all shadow-brutal hover:-translate-y-2 hover:-translate-x-1 hover:shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] duration-200">
                <div class="p-8 flex-grow">
                    <div class="flex items-center justify-between mb-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-genz-pink text-white border-2 border-genz-dark shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] uppercase tracking-wider">
                            {{ $request->category->name ?? 'General' }}
                        </span>
                        <span class="text-sm font-bold text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-genz-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            {{ $request->location }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-black text-genz-dark mb-3 leading-tight">{{ $request->title }}</h3>
                    <p class="text-gray-600 mb-8 text-sm line-clamp-3 font-medium">{{ Str::limit($request->description, 120) }}</p>
                    
                    <div class="mt-auto">
                        <div class="flex justify-between text-sm font-black mb-2">
                            <span class="text-genz-pink">₹{{ number_format($request->amount_raised) }} raised</span>
                            <span class="text-gray-400">of ₹{{ number_format($request->amount_required) }}</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3 border border-gray-200 overflow-hidden">
                            @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                            <div class="bg-gradient-to-r from-genz-cyan to-genz-purple h-full" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="px-8 py-5 bg-genz-dark mt-auto group">
                    <a href="{{ route('donations.create') }}" class="w-full flex items-center justify-center text-white font-black text-lg group-hover:text-genz-cyan transition-colors">
                        Donate Now 
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-lg shadow">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No requests found</h3>
                <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $requests->links() }}
        </div>
    </div>
</x-app-layout>
