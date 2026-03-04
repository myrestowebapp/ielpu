<x-app-layout title="Help Requests">
    <div class="bg-gray-900 pb-24 pt-20 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute top-0 right-1/4 w-96 h-96 bg-primary rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
             <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-accent rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <span class="inline-block py-1 px-4 rounded-full bg-primary/20 text-primary-light font-bold tracking-wider text-[10px] uppercase mb-6">Verified Causes</span>
            <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight font-serif italic">Support a <span class="text-accent underline underline-offset-8 decoration-accent/30">Cause.</span></h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto font-medium leading-relaxed italic">Browse verified requests for assistance and make a direct impact where it's needed most.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <!-- Filters -->
        <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200/50 border border-gray-100 p-10 mb-20">
            <form action="{{ route('public.requests') }}" method="GET" class="flex flex-col md:flex-row gap-8 items-end">
                <div class="flex-1 w-full">
                    <label for="category" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Filter by Category</label>
                    <select name="category_id" id="category" class="w-full bg-gray-50 border-gray-100 rounded-xl focus:border-primary focus:ring-0 py-4 px-5 font-serif italic transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 w-full">
                    <label for="location" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Search Location</label>
                    <input type="text" name="location" id="location" value="{{ request('location') }}" placeholder="City or region..." class="w-full bg-gray-50 border-gray-100 rounded-xl focus:border-primary focus:ring-0 py-4 px-5 font-serif italic transition-all">
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-10 py-4 rounded-xl font-bold transition-all shadow-lg shadow-primary/20 uppercase tracking-wider text-xs">Search</button>
                    @if(request()->has('category_id') || request()->has('location'))
                        <a href="{{ route('public.requests') }}" class="text-gray-400 hover:text-accent font-bold transition-colors text-xs uppercase tracking-widest">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($requests as $request)
            <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden flex flex-col transition-all hover:shadow-2xl hover:-translate-y-1 group">
                <div class="p-10 flex-grow">
                    <div class="flex items-center justify-between mb-8">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-black bg-accent text-white uppercase tracking-widest">
                            {{ $request->category->name ?? 'General' }}
                        </span>
                        <span class="text-[10px] font-bold text-gray-400 flex items-center uppercase tracking-widest">
                            <svg class="w-3.5 h-3.5 mr-1.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            {{ $request->location }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4 leading-tight font-serif italic">{{ $request->title }}</h3>
                    <p class="text-gray-500 mb-10 text-sm line-clamp-3 font-medium leading-relaxed italic">{{ Str::limit($request->description, 130) }}</p>
                    
                    <div class="mt-auto">
                        <div class="flex justify-between text-[11px] font-black mb-3 italic">
                            <span class="text-primary uppercase tracking-widest">₹{{ number_format($request->amount_raised) }} raised</span>
                            <span class="text-gray-300 uppercase tracking-widest">of ₹{{ number_format($request->amount_required) }}</span>
                        </div>
                        <div class="w-full bg-gray-50 rounded-full h-2 overflow-hidden shadow-inner">
                            @php $percent = $request->amount_required > 0 ? min(100, ($request->amount_raised / $request->amount_required) * 100) : 0; @endphp
                            <div class="bg-primary h-full transition-all duration-1000" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="px-10 py-6 border-t border-gray-50 bg-gray-50/50 group-hover:bg-primary transition-colors">
                    <a href="{{ route('donations.create') }}" class="w-full flex items-center justify-center text-gray-900 group-hover:text-white font-black text-sm uppercase tracking-widest transition-colors">
                        Donate Now 
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 text-center bg-gray-50 rounded-3xl border border-dashed border-gray-200">
                <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-4 text-lg font-black text-gray-900 font-serif italic">No requests found</h3>
                <p class="mt-2 text-sm text-gray-500 font-medium italic">Try adjusting your search filters above.</p>
            </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
