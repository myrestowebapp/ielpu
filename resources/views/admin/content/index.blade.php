<x-admin-layout title="Public Narrative">
    <!-- Content Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group hover:border-primary/20 transition-all">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Total Narrative Assets</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['total_posts'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">PUBLISHED & DRAFTS</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group hover:border-primary/20 transition-all">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Live Publications</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-primary transition-colors">{{ $stats['published'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">PUBLICLY ACCESSIBLE</p>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm group hover:border-accent/20 transition-all">
            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-2">Pending Strategy</p>
            <h3 class="text-3xl font-black text-gray-900 font-serif italic leading-none group-hover:text-accent transition-colors">{{ $stats['drafts'] }}</h3>
            <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-3 italic">WORK IN PROGRESS</p>
        </div>
    </div>

    <!-- Content Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-gray-900 font-serif italic">Communication Registry</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Blogs & Official Announcements</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-5 py-2.5 bg-white border border-gray-100 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-50 transition-all shadow-sm italic">Media Library</button>
                <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all shadow-xl shadow-gray-200">Compose New</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Headline</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Type</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Author</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div>
                                    <p class="text-sm font-black text-gray-900 font-serif italic leading-tight group-hover:text-primary transition-colors mb-1 line-clamp-1">"{{ $post->title }}"</p>
                                    <p class="text-[8px] text-gray-400 font-bold uppercase tracking-widest italic">ESTABLISHED {{ $post->created_at->format('M d, Y') }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-[10px] font-black uppercase tracking-widest italic {{ $post->type === 'blog' ? 'text-primary' : 'text-blue-500' }}">
                                    {{ $post->type }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] text-gray-900 font-bold tracking-widest">{{ $post->author }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $post->status === 'published' ? 'bg-primary' : 'bg-gray-300' }}"></span>
                                    <span class="text-[10px] font-black text-gray-900 uppercase tracking-widest italic">{{ $post->status }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="p-2 text-gray-400 hover:text-primary transition-colors bg-white rounded-lg shadow-sm border border-transparent hover:border-gray-100">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-lg shadow-sm border border-transparent hover:border-gray-100">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
