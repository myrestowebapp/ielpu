<x-app-layout title="Submit a Request">
    <div class="bg-gray-900 pb-24 pt-20 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute top-0 right-1/4 w-96 h-96 bg-primary rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
             <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-accent rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
        </div>
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <h1 class="text-5xl font-black mb-6 tracking-tight font-serif italic">Seek <span class="text-accent underline underline-offset-8 decoration-accent/30">Assistance.</span></h1>
            <p class="text-lg text-gray-400 font-medium italic leading-relaxed">Submit your case for review. Once verified by our transparency team, it will be published to our community of donors.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200/50 border border-gray-100 p-10 md:p-14">
            <form action="{{ route('help-requests.store') }}" method="POST" class="space-y-10">
                @csrf
                
                <div class="space-y-3">
                    <label for="title" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Cause Title</label>
                    <input type="text" name="title" id="title" placeholder="e.g. Emergency Medical Support for..." required class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-5 px-6 font-serif italic text-lg focus:border-primary focus:ring-0 transition-all placeholder-gray-200">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label for="category_id" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Category</label>
                        <select id="category_id" name="category_id" required class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-5 px-6 font-serif italic text-lg focus:border-primary focus:ring-0 transition-all cursor-pointer">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label for="location" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">City / Region</label>
                        <input type="text" name="location" id="location" placeholder="City name" required class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-5 px-6 font-serif italic text-lg focus:border-primary focus:ring-0 transition-all placeholder-gray-200">
                    </div>
                </div>

                <div class="space-y-3">
                    <label for="amount_required" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Amount Required (INR)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                            <span class="text-primary font-bold text-2xl">₹</span>
                        </div>
                        <input type="number" name="amount_required" id="amount_required" min="1" step="0.01" placeholder="0.00" required class="block w-full pl-14 py-6 text-3xl font-black text-gray-900 bg-gray-50/50 border border-gray-100 rounded-xl focus:border-primary focus:ring-0 transition-all placeholder-gray-200">
                    </div>
                </div>

                <div class="space-y-3">
                    <label for="description" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Narrative & Usage</label>
                    <textarea id="description" name="description" rows="6" required placeholder="Explain the situation in detail..." class="block w-full bg-gray-50/50 border border-gray-100 rounded-xl py-5 px-6 font-medium text-gray-700 italic leading-relaxed focus:border-primary focus:ring-0 transition-all placeholder-gray-200"></textarea>
                    <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mt-2 italic">Detailed information helps donors understand the urgency.</p>
                </div>

                <div class="pt-10 border-t border-gray-50">
                    <button type="submit" class="w-full flex justify-center py-6 px-8 rounded-2xl font-bold text-lg text-white uppercase tracking-widest bg-primary hover:bg-primary-dark transition-all shadow-xl shadow-primary/20 focus:outline-none">
                        Submit for Verification
                    </button>
                    <div class="flex items-center justify-center space-x-6 mt-8">
                        <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest italic">Verification: 24-48 Hours</span>
                        <div class="w-1 h-1 bg-gray-200 rounded-full"></div>
                        <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest italic">Transparency Secured</span>
                    </div>
                </div>
    </div>
</x-app-layout>
