<x-app-layout title="Transparency Ledger">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Transparency Ledger</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">We believe in 100% transparency. Every dollar donated and distributed is tracked and publicly available below.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Incoming Donations -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-teal-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Incoming Donations
                </h2>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        @forelse($donations as $donation)
                        <li>
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-blue-600 truncate">
                                        {{ $donation->donor ? $donation->donor->name : 'Anonymous Donor' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            +${{ number_format($donation->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            For: {{ $donation->helpRequest ? Str::limit($donation->helpRequest->title, 40) : 'General Relief Fund' }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <p>{{ $donation->created_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-4 py-8 text-center text-gray-500 text-sm">No donations recorded yet.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-4">
                    {{ $donations->appends(['distributionsPage' => request('distributionsPage')])->links() }}
                </div>
            </div>

            <!-- Outgoing Distributions -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                    Fund Distributions
                </h2>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        @forelse($distributions as $distribution)
                        <li>
                            <div class="px-4 py-4 sm:px-6 bg-orange-50/30">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $distribution->helpRequest->title ?? 'Unknown Case' }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                            -${{ number_format($distribution->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500 italic">
                                            {{ Str::limit($distribution->notes ?? 'Financial assistance provided', 60) }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <p>{{ $distribution->date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="px-4 py-8 text-center text-gray-500 text-sm">No distributions recorded yet.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-4">
                    {{ $distributions->appends(['donationsPage' => request('donationsPage')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
