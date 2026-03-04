<x-admin-layout title="Strategic Intelligence">
    <!-- Analysis Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group font-serif italic">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Monthly Inflow</p>
            <h3 class="text-3xl font-black text-gray-900 leading-none group-hover:text-primary transition-colors italic">₹{{ number_format($stats['monthly_revenue'], 0) }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">CURRENT PERIOD PERFORMANCE</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group border-l-primary/20">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Impact Velocity</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">+{{ $stats['impact_growth'] }}%</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">YEAR-ON-YEAR GROWTH</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Donor Fidelity</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['donor_retention'] }}%</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">RETENTION INDEX</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Revenue Trends -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-lg font-black text-gray-900 font-serif italic leading-none mb-1">Revenue Trajectory</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Quarterly Growth Modeling</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 bg-primary rounded-full"></span>
                    <span class="text-[10px] font-black text-gray-900 uppercase tracking-widest italic">REAL-TIME SYNC</span>
                </div>
            </div>
            
            <div class="space-y-6">
                @foreach($stats['recent_trends'] as $trend)
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $trend['month'] }}</span>
                            <span class="text-xs font-black text-gray-900">₹{{ number_format($trend['amount'], 0) }}</span>
                        </div>
                        <div class="w-full h-1.5 bg-gray-50 rounded-full overflow-hidden">
                            <div class="h-full bg-primary" style="width: {{ ($trend['amount'] / 500000) * 100 }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 pt-6 border-t border-gray-50 text-center">
                <button class="text-[10px] font-black uppercase tracking-widest text-primary hover:text-primary/70 italic transition-colors underline underline-offset-4">Download Detailed Financial Dossier</button>
            </div>
        </div>

        <!-- Impact Distribution -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
             <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-lg font-black text-gray-900 font-serif italic leading-none mb-1">Resource Allocation</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Sector-specific Impact Index</p>
                </div>
            </div>

            <div class="space-y-8">
                @foreach($stats['top_categories'] as $cat)
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-primary font-black font-serif italic text-lg mr-4">
                            {{ substr($cat['name'], 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-black text-gray-900 italic uppercase tracking-widest">{{ $cat['name'] }}</span>
                                <span class="text-[10px] font-black text-gray-400 italic">Target: {{ $cat['value'] }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-gray-50 rounded-full overflow-hidden">
                                <div class="h-full bg-primary" style="width: {{ $cat['value'] }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="mt-8 text-[10px] text-gray-400 italic font-bold leading-relaxed text-center">
                Reports are generated based on verified blockchain transactions and manual audit logs.
            </p>
        </div>
    </div>
</x-admin-layout>
