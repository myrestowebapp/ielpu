<x-app-layout title="Make a Donation">
    <div class="bg-orange-500 pb-24 pt-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl font-extrabold mb-4">Make a Donation</h1>
            <p class="text-xl text-orange-100">Your generosity creates ripple effects of hope. 100% of your donation is publicly tracked.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-lg shadow-xl p-8">
            
            @if(isset($helpRequest))
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-md mx-auto">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-blue-700 font-semibold mb-1">
                                You are supporting:
                            </p>
                            <p class="text-lg font-bold text-gray-900">
                                {{ $helpRequest->title }}
                            </p>
                            <p class="text-sm mt-1 text-gray-600">
                                Goal: ${{ number_format($helpRequest->amount_required) }} | Raised: ${{ number_format($helpRequest->amount_raised) }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 mb-6 rounded-r-md mx-auto">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-indigo-700 font-semibold">
                                You are donating to the General Relief Fund. These funds are allocated to urgent needs as they arise.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('donations.store') }}" method="POST">
                @csrf
                @if(isset($helpRequest))
                    <input type="hidden" name="help_request_id" value="{{ $helpRequest->id }}">
                @endif
                
                <div class="space-y-6">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Donation Amount (USD)</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="amount" id="amount" min="1" step="0.01" placeholder="50.00" required class="focus:ring-orange-500 focus:border-orange-500 block w-full pl-7 py-3 pr-12 sm:text-lg border-gray-300 border rounded-md">
                        </div>
                    </div>

                    <!-- Payment Simulation Note -->
                    <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Secure Payment Simulation
                        </h4>
                        <p class="text-xs text-gray-500 mb-3">This is a transparency platform demonstration. No real money will be charged. Click below to simulate a successful transaction.</p>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Name on Card</label>
                                <input type="text" value="Jane Doe" disabled class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md sm:text-xs px-2 py-1">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Card Number</label>
                                <input type="text" value="**** **** **** 4242" disabled class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md sm:text-xs px-2 py-1">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_anonymous" class="font-medium text-gray-700">Make this donation anonymously</label>
                            <p class="text-gray-500">Your name will not appear on the public Transparency Ledger.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                            Complete Donation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
