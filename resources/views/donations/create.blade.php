<x-app-layout title="Make a Donation">
    <div class="bg-gray-900 pb-24 pt-20 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-accent rounded-full mix-blend-overlay filter blur-[120px] opacity-10"></div>
        </div>
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <h1 class="text-5xl font-black mb-6 tracking-tight font-serif italic">Support our <span class="text-accent underline underline-offset-8 decoration-accent/30">Mission.</span></h1>
            <p class="text-lg text-gray-400 font-medium italic leading-relaxed">Your generosity creates ripple effects of hope. 100% of your donation is publicly tracked for accountability.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 mb-20">
        <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200/50 border border-gray-100 p-10 md:p-14">
            
            @if(isset($helpRequest))
                <div class="bg-gray-50 border-l-4 border-primary p-8 mb-12 rounded-r-2xl">
                    <div class="flex">
                        <div class="w-full">
                            <p class="text-[10px] text-primary font-black uppercase tracking-widest mb-3">
                                Targeted Support:
                            </p>
                            <p class="text-3xl font-black text-gray-900 mb-6 leading-tight font-serif italic">
                                {{ $helpRequest->title }}
                            </p>
                            <div class="flex justify-between items-center text-[11px] font-bold bg-white p-4 rounded-xl border border-gray-100 shadow-sm italic">
                                <span class="text-gray-400 uppercase tracking-widest">Goal: <span class="text-gray-900">₹{{ number_format($helpRequest->amount_required) }}</span></span>
                                <span class="text-accent uppercase tracking-widest">Raised: ₹{{ number_format($helpRequest->amount_raised) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-primary/5 border-l-4 border-primary p-8 mb-12 rounded-r-2xl">
                    <div class="flex">
                        <div>
                            <p class="text-2xl font-black text-gray-900 font-serif italic">
                                Genaral <span class="text-primary italic">Impact Fund</span>
                            </p>
                            <p class="text-gray-500 mt-3 font-medium text-sm leading-relaxed italic">These funds are dynamically allocated to urgent cases as they arise by our verification team.</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('donations.store') }}" method="POST" class="space-y-10">
                @csrf
                @if(isset($helpRequest))
                    <input type="hidden" name="help_request_id" value="{{ $helpRequest->id }}">
                @endif
                
                <div>
                    <label for="amount" class="block text-xl font-black text-gray-900 mb-6 font-serif italic">Contribution Amount</label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-7 flex items-center pointer-events-none">
                            <span class="text-primary font-bold text-3xl">₹</span>
                        </div>
                        <input type="number" name="amount" id="amount" min="1" step="0.01" placeholder="0.00" required class="block w-full pl-16 py-8 text-4xl font-black text-gray-900 border-gray-100 bg-gray-50/50 rounded-2xl focus:border-primary focus:ring-0 transition-all placeholder-gray-200">
                    </div>
                </div>

                <!-- Payment Simulation Note -->
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 relative group overflow-hidden">
                    <div class="absolute top-0 right-0 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-bl-xl border-b border-l border-primary/5">Secured Simulation</div>
                    <h4 class="text-lg font-black text-gray-900 mb-3 flex items-center font-serif italic">
                        <svg class="w-5 h-5 mr-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Secure Transaction
                    </h4>
                    <p class="text-sm font-medium text-gray-400 mb-8 italic">This platform is in demonstration mode. No real money will be processed. We will simulate a verified ledger entry.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Cardholder Name</label>
                            <input type="text" value="Identity Protected" disabled class="block w-full bg-gray-100 border-none rounded-xl font-bold text-gray-400 px-4 py-3 cursor-not-allowed italic text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Card Number</label>
                            <input type="text" value="**** **** **** 0000" disabled class="block w-full bg-gray-100 border-none rounded-xl font-bold text-gray-400 px-4 py-3 cursor-not-allowed tracking-[0.2em] text-sm italic">
                        </div>
                    </div>
                </div>

                <div class="flex items-start bg-gray-50/50 p-6 rounded-2xl border border-gray-50 hover:border-primary/20 transition-all cursor-pointer group" onclick="document.getElementById('is_anonymous').click()">
                    <div class="flex items-center h-6 mt-1">
                        <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" class="w-5 h-5 text-primary border-gray-200 rounded focus:ring-primary transition-all cursor-pointer">
                    </div>
                    <div class="ml-5">
                        <label for="is_anonymous" class="font-black text-gray-900 cursor-pointer text-lg font-serif italic">Remain Anonymous</label>
                        <p class="text-gray-400 font-medium text-sm mt-1 italic">Your name will be hidden from the public Transparency Ledger.</p>
                    </div>
                </div>

                <div class="pt-10 border-t border-gray-50">
                    <button type="submit" class="w-full flex justify-center py-6 px-8 rounded-2xl font-bold text-lg text-white uppercase tracking-widest bg-primary hover:bg-primary-dark transition-all shadow-xl shadow-primary/20 focus:outline-none">
                        Proceed with Contribution
                    </button>
                    <div class="flex items-center justify-center space-x-6 mt-6">
                        <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">End-to-End Encrypted</span>
                        <div class="w-1 h-1 bg-gray-200 rounded-full"></div>
                        <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">PCI-DSS Compliant</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
