<x-app-layout title="Make a Donation">
    <div class="bg-gradient-to-br from-genz-pink to-genz-purple pb-24 pt-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl font-black mb-4 tracking-tight text-white drop-shadow-[4px_4px_0px_rgba(15,23,42,1)]">Make a <span class="text-genz-yellow">Donation</span></h1>
            <p class="text-xl text-white font-medium bg-black/20 p-4 rounded-xl backdrop-blur-sm border-2 border-white/20 inline-block shadow-soft">Your generosity creates ripple effects of hope. 100% of your donation is publicly tracked.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-2xl shadow-brutal border-2 border-genz-dark p-8 md:p-12">
            
            @if(isset($helpRequest))
                <div class="bg-genz-cyan/10 border-l-4 border-genz-cyan p-6 mb-8 rounded-r-xl">
                    <div class="flex">
                        <div class="ml-3 w-full">
                            <p class="text-xs text-genz-cyan font-black uppercase tracking-widest mb-1">
                                You are supporting:
                            </p>
                            <p class="text-2xl font-black text-genz-dark mb-2 leading-tight">
                                {{ $helpRequest->title }}
                            </p>
                            <div class="flex justify-between items-center text-sm font-bold bg-white p-3 rounded-lg border-2 border-genz-cyan/30 mt-3 shadow-[2px_2px_0px_0px_rgba(6,182,212,0.3)]">
                                <span class="text-gray-500">Goal: <span class="text-genz-dark">₹{{ number_format($helpRequest->amount_required) }}</span></span>
                                <span class="text-genz-pink">Raised: ₹{{ number_format($helpRequest->amount_raised) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-genz-purple/10 border-l-4 border-genz-purple p-6 mb-8 rounded-r-xl">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-xl font-bold text-genz-dark">
                                You are donating to the <span class="text-genz-purple underline decoration-genz-pink decoration-4 underline-offset-4">General Impact Fund</span>.
                            </p>
                            <p class="text-gray-600 mt-2 font-medium">These funds are dynamically allocated to urgent cases as they arise.</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('donations.store') }}" method="POST" class="space-y-8">
                @csrf
                @if(isset($helpRequest))
                    <input type="hidden" name="help_request_id" value="{{ $helpRequest->id }}">
                @endif
                
                <div>
                    <label for="amount" class="block text-2xl font-black text-genz-dark mb-4">How much do you want to contribute?</label>
                    <div class="mt-1 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                            <span class="text-gray-400 font-bold text-2xl">₹</span>
                        </div>
                        <input type="number" name="amount" id="amount" min="1" step="0.01" placeholder="500" required class="block w-full pl-14 py-6 text-3xl font-black text-genz-dark border-4 border-gray-200 rounded-2xl focus:border-genz-pink focus:ring-0 transition-colors placeholder-gray-300">
                    </div>
                </div>

                <!-- Payment Simulation Note -->
                <div class="bg-gray-50 p-6 rounded-2xl border-2 border-gray-200 border-dashed relative overflow-hidden group hover:border-genz-purple transition-colors">
                    <div class="absolute top-0 right-0 bg-genz-yellow text-genz-dark text-xs font-black uppercase tracking-wider px-3 py-1 rounded-bl-lg">Demo Mode</div>
                    <h4 class="text-lg font-black text-gray-800 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500 group-hover:text-genz-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Secure Payment Simulation
                    </h4>
                    <p class="text-sm font-medium text-gray-500 mb-5">This is a transparency platform demonstration. No real money will be charged. We'll simulate a successful transaction.</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Name on Card</label>
                            <input type="text" value="Anonymity Preserved" disabled class="block w-full bg-gray-200 border-2 border-transparent rounded-lg font-bold text-gray-500 px-3 py-2 cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Card Number</label>
                            <input type="text" value="**** **** **** 4242" disabled class="block w-full bg-gray-200 border-2 border-transparent rounded-lg font-bold text-gray-500 px-3 py-2 cursor-not-allowed tracking-[0.2em]">
                        </div>
                    </div>
                </div>

                <div class="flex items-start bg-gray-50 p-4 rounded-xl border border-gray-100 hover:bg-gray-100 transition-colors cursor-pointer" onclick="document.getElementById('is_anonymous').click()">
                    <div class="flex items-center h-6 mt-1">
                        <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" class="w-5 h-5 text-genz-pink bg-white border-2 border-gray-300 rounded focus:ring-genz-pink focus:ring-2 cursor-pointer">
                    </div>
                    <div class="ml-4">
                        <label for="is_anonymous" class="font-bold text-genz-dark cursor-pointer text-lg">Make this donation anonymously 🕵️</label>
                        <p class="text-gray-500 font-medium text-sm mt-1">Your name will not appear on the public Transparency Ledger.</p>
                    </div>
                </div>

                <div class="pt-6 border-t-2 border-gray-100">
                    <button type="submit" class="w-full flex justify-center py-5 px-6 rounded-2xl font-black text-xl text-white uppercase tracking-wider bg-genz-dark border-2 border-transparent shadow-[6px_6px_0px_0px_rgba(236,72,153,1)] hover:shadow-[2px_2px_0px_0px_rgba(236,72,153,1)] hover:translate-x-[4px] hover:translate-y-[4px] transition-all focus:outline-none">
                        Complete Donation
                    </button>
                    <p class="text-center text-xs font-bold text-gray-400 mt-4 uppercase tracking-widest">100% Secure & Encrypted</p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
