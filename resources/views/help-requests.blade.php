<x-app-layout title="Help Requests">
    <div class="bg-blue-800 pb-24 pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl font-extrabold mb-4">Support a Cause</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Browse verified requests for assistance and make a direct impact where it's needed most.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <form action="{{ route('public.requests') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category_id" id="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location" id="location" value="{{ request('location') }}" placeholder="Search by city or region..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition w-full md:w-auto">Filter</button>
                    @if(request()->has('category_id') || request()->has('location'))
                        <a href="{{ route('public.requests') }}" class="ml-4 text-gray-500 hover:text-gray-700 self-center mb-2">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($requests as $request)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition hover:shadow-xl transform hover:-translate-y-1">
                <div class="p-6 flex-grow">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $request->category->name ?? 'General' }}
                        </span>
                        <span class="text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            {{ $request->location }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $request->title }}</h3>
                    <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($request->description, 120) }}</p>
                    
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
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 text-center">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white w-full px-4 py-2 rounded font-semibold transition">Donate</button>
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
