<x-admin-layout title="Distribution Ledger">
    <!-- Allocation Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Total Allocated</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">₹{{ number_format($stats['total_allocated'], 2) }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">FUNDS DISBURSED</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Average Grant</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">₹{{ number_format($stats['avg_allocation'], 2) }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">MEAN DISTRIBUTION VALUE</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Audit Frequency</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['total_count'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">TOTAL ALLOCATION EVENTS</p>
        </div>
    </div>

    <!-- Allocations Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-gray-900 font-serif italic">Transparency Records</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Public Accountability Ledger</p>
            </div>
            <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all">New Allocation</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Target Case</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Quantum</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Execution Date</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Audit Notes</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($distributions as $dist)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div>
                                    <p class="text-sm font-black text-gray-900 font-serif italic leading-none mb-1 group-hover:text-primary transition-colors">{{ $dist->helpRequest->title ?? 'General Distribution' }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">ID: #{{ str_pad($dist->help_request_id, 5, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-md font-black text-gray-900 leading-none">₹{{ number_format($dist->amount, 2) }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] text-gray-900 font-black uppercase tracking-widest">{{ $dist->date ? $dist->date->format('d M, Y') : $dist->created_at->format('d M, Y') }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] text-gray-400 font-bold italic line-clamp-1 max-w-xs">"{{ $dist->notes ?? 'No additional documentation provided.' }}"</p>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="p-2 text-gray-400 hover:text-primary transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <p class="text-xs font-black text-gray-300 uppercase tracking-widest italic leading-relaxed">No fund distributions have been recorded.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($distributions, 'links'))
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                {{ $distributions->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
