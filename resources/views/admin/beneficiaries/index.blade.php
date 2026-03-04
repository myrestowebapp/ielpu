<x-admin-layout title="Constituency Support">
    <!-- Beneficiary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Total Beneficiaries</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['total'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">ENROLLED INDIVIDUALS</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Verified Status</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['verified'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">KYC COMPLIANT MEMBERS</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Awaiting Analysis</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-accent transition-colors">{{ $stats['pending'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">INSPECTION QUEUE</p>
        </div>
    </div>

    <!-- Beneficiaries Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-gray-900 font-serif italic">Identity Verification</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">KYC & Document Management</p>
            </div>
            <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all">Enroll Beneficiary</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Individual</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Linked Cases</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">KYC Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Document Registry</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($beneficiaries as $ben)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400 font-serif italic font-black mr-4 group-hover:bg-primary group-hover:text-white transition-all">
                                        {{ substr($ben->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-gray-900 font-serif italic leading-none mb-1">{{ $ben->name }}</p>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $ben->phone ?? 'No Phone' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @if(count($ben->helpRequests) > 0)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($ben->helpRequests as $req)
                                            <span class="px-2 py-0.5 bg-primary/5 text-primary text-[8px] font-black uppercase tracking-widest rounded italic">{{ $req->title }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-[10px] text-gray-300 font-bold uppercase tracking-widest italic">No Active Cases</span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $ben->status === 'active' ? 'bg-primary' : 'bg-red-400' }}"></span>
                                    <span class="text-[10px] font-black text-gray-900 uppercase tracking-widest italic">{{ $ben->status === 'active' ? 'VERIFIED' : 'PENDING' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-2">
                                    <span class="text-[10px] font-bold text-gray-400 italic">Affidavit.pdf</span>
                                    <svg class="w-3 h-3 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="px-3 py-1.5 border border-gray-100 rounded-lg text-[8px] font-black uppercase tracking-widest text-gray-400 hover:text-primary hover:border-primary/20 transition-all">View Dossier</button>
                                    <button class="px-3 py-1.5 bg-gray-900 text-white rounded-lg text-[8px] font-black uppercase tracking-widest hover:bg-black transition-all shadow-sm">Audit</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                         <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <p class="text-xs font-black text-gray-300 uppercase tracking-widest italic leading-relaxed">No beneficiary records identified.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($beneficiaries, 'links'))
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                {{ $beneficiaries->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
