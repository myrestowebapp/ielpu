@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') . ' - Admin' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#15803d',
                            dark: '#166534',
                            light: '#22c55e',
                        },
                        accent: {
                            DEFAULT: '#db2777',
                            dark: '#be185d',
                            light: '#f472b6',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                }
            }
        }
    </script>

    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 10px; }
    </style>
</head>
<body class="h-full font-sans text-gray-900">
    <div class="flex h-full overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col h-0 flex-1 bg-gray-900">
                    <div class="flex items-center h-20 flex-shrink-0 px-6 bg-gray-900 border-b border-white/5">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                             <div class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl shadow-lg shadow-primary/20 group-hover:rotate-6 transition-transform">
                                <span class="text-white font-black text-xl italic font-serif">I</span>
                             </div>
                             <div>
                                <h1 class="text-white font-serif italic font-black text-xl leading-none">IELPU</h1>
                                <p class="text-[8px] text-gray-500 uppercase tracking-[0.2em] mt-1 font-bold">Admin Portal</p>
                             </div>
                        </a>
                    </div>
                    <div class="flex-1 flex flex-col overflow-y-auto sidebar-scroll">
                        <nav class="flex-1 px-4 py-8 space-y-1">
                            @php
                                $navItems = [
                                    ['name' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'route' => 'admin.dashboard'],
                                    ['name' => 'User Management', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'route' => 'admin.users'],
                                    ['name' => 'Donation Tracking', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'route' => 'admin.donations'],
                                    ['name' => 'Campaign Management', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z', 'route' => 'admin.campaigns'],
                                    ['name' => 'Content Management', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 4v4h4', 'route' => 'admin.content'],
                                    ['name' => 'Beneficiary Support', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'route' => 'admin.beneficiaries'],
                                    ['name' => 'Fund Allocation', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'route' => 'admin.allocations'],
                                    ['name' => 'Reports & Analytics', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'route' => 'admin.reports'],
                                    ['name' => 'Settings & Security', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'route' => 'admin.settings'],
                                ];
                            @endphp

                            @foreach($navItems as $item)
                                @php $isActive = request()->routeIs($item['route']); @endphp
                                <a href="{{ route($item['route']) }}" 
                                   class="{{ $isActive ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }} group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all">
                                    <svg class="{{ $isActive ? 'text-white' : 'text-gray-500 group-hover:text-white' }} mr-3 flex-shrink-0 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                                    </svg>
                                    {{ $item['name'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                    <!-- User Section -->
                    <div class="flex-shrink-0 flex bg-gray-900 border-t border-white/5 p-4">
                        <div class="flex-shrink-0 w-full group block">
                            <div class="flex items-center">
                                <div class="inline-block h-9 w-9 rounded-xl bg-accent flex items-center justify-center text-white font-black font-serif italic shadow-lg shadow-accent/20">
                                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <p class="text-xs font-black text-white italic truncate max-w-[120px]">
                                        {{ auth()->user()->name ?? 'Admin' }}
                                    </p>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-[10px] font-bold text-gray-500 hover:text-accent uppercase tracking-widest transition-colors">Sign Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <header class="relative z-10 flex-shrink-0 flex h-20 bg-white border-b border-gray-100 items-center justify-between px-8">
                <div>
                    <h2 class="text-xl font-black text-gray-900 font-serif italic leading-none">{{ $title ?? 'Dashboard' }}</h2>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1 italic">IELPU Philanthropy Management</p>
                </div>
                <div class="flex items-center space-x-6">
                    <button class="p-2 rounded-xl text-gray-400 hover:bg-gray-50 hover:text-primary transition-all relative">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-2 right-2 block h-2 w-2 rounded-full bg-accent ring-2 ring-white"></span>
                    </button>
                    <div class="h-8 w-[1px] bg-gray-100"></div>
                    <a href="{{ route('home') }}" class="text-xs font-black text-gray-400 hover:text-primary uppercase tracking-widest transition-colors flex items-center">
                        View Site
                        <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 00-2 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </header>

            <main class="flex-1 relative overflow-y-auto focus:outline-none bg-gray-50/50">
                <div class="py-12 px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
