<x-app-layout title="Submit a Request">
    <div class="bg-blue-800 pb-24 pt-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl font-extrabold mb-4">Request Assistance</h1>
            <p class="text-xl text-blue-100">Submit your case for review. Once verified by our team, it will be published to our community of donors.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <form action="{{ route('help-requests.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Request Title</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category_id" name="category_id" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location (City, Region)</label>
                        <input type="text" name="location" id="location" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="amount_required" class="block text-sm font-medium text-gray-700">Amount Required (USD)</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="amount_required" id="amount_required" min="1" step="0.01" required class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 py-2 pr-12 sm:text-sm border-gray-300 border rounded-md">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Detailed Description</label>
                        <p class="text-xs text-gray-500 mb-2">Please explain your situation, why you need these funds, and how they will be used.</p>
                        <textarea id="description" name="description" rows="5" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border border-gray-300 rounded-md py-2 px-3"></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            Submit Request for Review
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
