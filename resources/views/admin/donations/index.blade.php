<x-admin-layout title="Financial Ledger">
    <!-- Financial Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Aggregate Revenue</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">₹{{ number_format($stats['total_amount'], 2) }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">LIFETIME CONTRIBUTIONS</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Contribution Velocity</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">₹{{ number_format($stats['avg_donation'], 2) }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">AVERAGE GIFT VALUE</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Donor Engagement</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['total_count'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">TOTAL TRANSACTIONS</p>
        </div>
    </div>

    <!-- Donations Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-gray-900 font-serif italic">Transaction History</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Real-time Financial Audit</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-5 py-2.5 bg-white border border-gray-100 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-50 transition-all shadow-sm">Audit Reports</button>
                <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all shadow-xl shadow-gray-200">Export Ledger</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Benefactor</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Campaign Reference</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Quantum</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Auth ID</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($donations as $donation)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div>
                                    <p class="text-sm font-black text-gray-900 font-serif italic leading-none mb-1 group-hover:text-primary transition-colors">{{ $donation->donor->name ?? 'Anonymous' }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Verified Philanthropist</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-xs font-bold text-gray-600 italic line-clamp-1">{{ $donation->helpRequest->title ?? 'General Fund' }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-black text-gray-900 leading-none">₹{{ number_format($donation->amount, 2) }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gray-50 px-3 py-1 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $donation->transaction_id }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] text-gray-900 font-black uppercase tracking-widest">{{ $donation->created_at->format('d M, Y') }}</p>
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest mt-1 italic">{{ $donation->created_at->format('H:i') }} IST</p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <p class="text-xs font-black text-gray-300 uppercase tracking-widest italic leading-relaxed">No transactions recorded in the current audit cycle.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($donations, 'links'))
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                {{ $donations->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
