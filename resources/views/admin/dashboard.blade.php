<x-app-layout title="Admin Dashboard">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Admin Dashboard</h1>
            <p class="text-gray-500">Manage Help Requests and Record Fund Distributions.</p>
        </div>
        
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                <h3 class="text-lg font-medium text-gray-900">Total Donations Received</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">${{ number_format($totalDonations, 2) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-500">
                <h3 class="text-lg font-medium text-gray-900">Total Funds Distributed</h3>
                <p class="text-3xl font-bold text-orange-600 mt-2">${{ number_format($totalDistributions, 2) }}</p>
            </div>
        </div>

        <!-- Pending Verifications -->
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Pending Verifications</h2>
        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-12">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse($pendingRequests as $req)
                <li>
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $req->title }}</h3>
                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</p>
                        </div>
                        <div class="sm:flex sm:justify-between text-sm text-gray-500 mb-4">
                            <p>Required: ${{ number_format($req->amount_required, 2) }}</p>
                            <p>Category: {{ $req->category->name ?? 'None' }}</p>
                            <p>Location: {{ $req->location }}</p>
                        </div>
                        <p class="text-gray-700 text-sm mb-4">{{ $req->description }}</p>
                        <div class="flex space-x-3">
                            <form action="{{ route('admin.requests.status', $req->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-medium transition">Approve</button>
                            </form>
                            <form action="{{ route('admin.requests.status', $req->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium transition">Reject</button>
                            </form>
                        </div>
                    </div>
                </li>
                @empty
                <li class="px-4 py-8 text-center text-gray-500">No pending help requests.</li>
                @endforelse
            </ul>
        </div>

        <!-- Record Distribution -->
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Record Fund Distribution</h2>
        <div class="bg-white shadow sm:rounded-md p-6">
            <form action="{{ route('admin.distributions.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="help_request_id" class="block text-sm font-medium text-gray-700">Approved Help Request</label>
                        <select id="help_request_id" name="help_request_id" required class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md border">
                            <option value="">Select a case...</option>
                            @foreach($approvedRequests as $req)
                                <option value="{{ $req->id }}">{{ $req->title }} (Needed: ${{ number_format($req->amount_required - $req->amount_raised, 2) }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount Distributed ($)</label>
                        <input type="number" name="amount" id="amount" min="1" step="0.01" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border px-3 py-2">
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date of Distribution</label>
                        <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border px-3 py-2">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notes / Transaction Details</label>
                        <textarea id="notes" name="notes" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition">Record Distribution to Ledger</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
