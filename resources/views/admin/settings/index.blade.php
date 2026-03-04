<x-admin-layout title="System Control">
    <div class="max-w-4xl">
        <!-- Configuration Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Organization Identity -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-black text-gray-900 font-serif italic mb-2">Platform Identity</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Global Branding & Communication</p>
                </div>
                
                <form class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-300 uppercase tracking-widest block mb-2">Legal Entity Name</label>
                        <input type="text" value="{{ $settings['org_name'] }}" class="w-full px-6 py-4 bg-white border border-gray-100 rounded-2xl text-sm font-serif italic font-black text-gray-900 focus:border-primary focus:ring-0 transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-300 uppercase tracking-widest block mb-2">Administrative Contact</label>
                        <input type="email" value="{{ $settings['org_email'] }}" class="w-full px-6 py-4 bg-white border border-gray-100 rounded-2xl text-sm font-serif italic font-black text-gray-900 focus:border-primary focus:ring-0 transition-all shadow-sm">
                    </div>
                    <button type="submit" class="px-8 py-3 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-black transition-all shadow-xl shadow-gray-200">Update Identity</button>
                </form>
            </div>

            <!-- Infrastructure & Security -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-black text-gray-900 font-serif italic mb-2">Secure Infrastructure</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Payment Protocols & Access Control</p>
                </div>

                <div class="space-y-6">
                    <div class="p-6 bg-gray-50 rounded-3xl border border-gray-100 group">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Stripe Gateway</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-[8px] font-black uppercase tracking-widest rounded italic">LIVE</span>
                        </div>
                        <p class="text-sm font-black text-gray-900 font-serif italic leading-none mb-1">Authenticated Terminal</p>
                        <p class="text-[10px] text-gray-300 font-bold uppercase tracking-widest mb-4">Merchant ID: ielpu_live_0x129</p>
                        <button class="w-full py-3 bg-white border border-gray-100 text-[8px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-50 transition-all shadow-sm">Configure API Vault</button>
                    </div>

                    <div class="p-6 bg-white border border-gray-100 rounded-3xl shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-black text-gray-900 uppercase tracking-widest mb-1 italic">Beneficiary KYC</p>
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest leading-none">MANDATORY VERIFICATION</p>
                            </div>
                            <div class="w-12 h-6 bg-primary rounded-full relative">
                                <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full shadow-sm"></div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-100 rounded-3xl shadow-sm">
                         <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-black text-gray-900 uppercase tracking-widest mb-1 italic">Currency Environment</p>
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest leading-none">DEFAULT UNIT: {{ $settings['currency'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance Zone -->
        <div class="mt-20 pt-12 border-t border-gray-50">
             <h2 class="text-[10px] font-black text-red-500 uppercase tracking-widest mb-6 italic text-center leading-none">Critical Operations Zone</h2>
             <div class="flex items-center justify-center space-x-4">
                <button class="px-8 py-3 bg-white border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-red-50 transition-all">Clear Metadata Cache</button>
                <button class="px-8 py-3 bg-white border border-gray-100 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-gray-50 transition-all italic">Enter Maintenance Mode</button>
             </div>
        </div>
    </div>
</x-admin-layout>
