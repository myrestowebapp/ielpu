<x-admin-layout title="Member Directory">
    <!-- User Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center group">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-primary/10 group-hover:text-primary transition-all mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Total Members</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['total'] }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center group">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-primary/10 group-hover:text-primary transition-all mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Active Donors</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['donors'] }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center group">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-accent/10 group-hover:text-accent transition-all mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Beneficiaries</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['beneficiaries'] }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center group">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:text-white transition-all mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest leading-none mb-1">Administrators</p>
                <h3 class="text-xl font-black text-gray-900 font-serif italic">{{ $stats['admins'] }}</h3>
            </div>
        </div>
    </div>

    <!-- User Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-gray-900 font-serif italic">Directory Listing</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Manage Community Access</p>
            </div>
            <button class="px-5 py-2.5 bg-gray-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-black transition-all">Add New Member</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Identify</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Role</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Contact</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400 font-serif italic font-black mr-4 group-hover:bg-primary group-hover:text-white transition-all">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-gray-900 font-serif italic mb-0.5">{{ $user->name }}</p>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest italic
                                    {{ $user->role === 'admin' ? 'bg-gray-900 text-white' : '' }}
                                    {{ $user->role === 'donor' ? 'bg-primary/10 text-primary' : '' }}
                                    {{ $user->role === 'beneficiary' ? 'bg-accent/10 text-accent' : '' }}
                                    {{ $user->role === 'volunteer' ? 'bg-blue-100 text-blue-600' : '' }}
                                ">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] text-gray-900 font-bold tracking-widest">{{ $user->phone ?? 'NO PHONE' }}</p>
                                <p class="text-[8px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1 italic">MEMBER SINCE {{ $user->created_at->format('M Y') }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $user->status === 'active' ? 'bg-primary' : 'bg-gray-200' }}"></span>
                                    <span class="text-[10px] font-black text-gray-900 uppercase tracking-widest italic">{{ $user->status ?? 'ACTIVE' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="p-2 text-gray-400 hover:text-primary transition-colors hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-gray-100" title="Edit Profile">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-accent transition-colors hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-gray-100" title="Suspend Access">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(method_exists($users, 'links'))
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
