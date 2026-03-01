<x-app-layout title="Submit a Request">
    <div class="bg-gradient-to-br from-genz-cyan to-genz-purple pb-24 pt-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl font-black mb-4 tracking-tight drop-shadow-[4px_4px_0px_rgba(15,23,42,1)]">Request <span class="text-genz-yellow">Assistance</span></h1>
            <p class="text-xl text-white font-medium bg-black/20 p-4 rounded-xl backdrop-blur-sm border-2 border-white/20 inline-block shadow-soft">Submit your case for review. Once verified by our team, it will be published to our community of donors.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-2xl shadow-brutal border-2 border-genz-dark p-8 md:p-12">
            <form action="{{ route('help-requests.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Request Title</label>
                    <input type="text" name="title" id="title" placeholder="e.g. Emergency Medical Fund for..." required class="block w-full bg-gray-50 border-2 border-gray-200 rounded-xl py-3 px-4 font-bold text-lg focus:border-genz-cyan focus:ring-0 transition-colors placeholder-gray-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category_id" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Category</label>
                        <select id="category_id" name="category_id" required class="block w-full bg-gray-50 border-2 border-gray-200 rounded-xl py-3 px-4 font-bold text-lg focus:border-genz-cyan focus:ring-0 transition-colors">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Location</label>
                        <input type="text" name="location" id="location" placeholder="City, Region" required class="block w-full bg-gray-50 border-2 border-gray-200 rounded-xl py-3 px-4 font-bold text-lg focus:border-genz-cyan focus:ring-0 transition-colors placeholder-gray-300">
                    </div>
                </div>

                <div>
                    <label for="amount_required" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Amount Required (INR)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-400 font-black text-xl">₹</span>
                        </div>
                        <input type="number" name="amount_required" id="amount_required" min="1" step="0.01" placeholder="50000" required class="block w-full pl-10 py-3 text-2xl font-black text-genz-dark bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-genz-cyan focus:ring-0 transition-colors placeholder-gray-300">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Detailed Description</label>
                    <p class="text-xs font-bold text-gray-500 mb-2">Please explain your situation, why you need these funds, and how they will be used.</p>
                    <textarea id="description" name="description" rows="5" required class="block w-full bg-gray-50 border-2 border-gray-200 rounded-xl py-3 px-4 font-medium text-gray-700 focus:border-genz-cyan focus:ring-0 transition-colors placeholder-gray-300"></textarea>
                </div>

                <div class="pt-6 border-t-2 border-gray-100">
                    <button type="submit" class="w-full flex justify-center py-5 px-6 rounded-2xl font-black text-xl text-white uppercase tracking-wider bg-genz-cyan border-2 border-genz-dark shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[4px] hover:translate-y-[4px] transition-all focus:outline-none text-genz-dark outline outline-2 outline-transparent hover:outline-genz-dark">
                        Submit Case for Review
                    </button>
                    <p class="text-center text-xs font-bold text-gray-400 mt-4 uppercase tracking-widest">Takes 24-48 hours for verification verification</p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
