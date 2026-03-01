<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Empowering Communities</title>
    <!-- Gen-Z Modern Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        genz: {
                            purple: '#8B5CF6',
                            pink: '#EC4899',
                            cyan: '#06B6D4',
                            yellow: '#FBBF24',
                            dark: '#0F172A',
                            light: '#F8FAFC'
                        }
                    },
                    boxShadow: {
                        'neon': '0 0 15px rgba(139, 92, 246, 0.5)',
                        'brutal': '4px 4px 0px 0px rgba(15, 23, 42, 1)',
                        'soft': '0 20px 40px -15px rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #FAFAFA; }
        .glass-panel { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #EC4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="text-gray-800 flex flex-col min-h-screen selection:bg-genz-pink selection:text-white">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">IELP</a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-orange-500 font-semibold transition">Home</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-orange-500 font-semibold transition">About Us</a>
                <a href="{{ route('public.requests') }}" class="text-gray-600 hover:text-orange-500 font-semibold transition">Help Requests</a>
                <a href="{{ route('public.ledger') }}" class="text-gray-600 hover:text-orange-500 font-semibold transition">Transparency Ledger</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('public.requests') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-full font-semibold transition shadow-md hover:-translate-y-0.5 transform">Donate Now</a>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-600 font-semibold">Admin Panel</a>
                    @else
                        <span class="text-gray-600 font-semibold hidden md:inline">Hello, {{ explode(' ', trim(auth()->user()->name))[0] }}</span>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-600 font-semibold">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-semibold">Login</a>
                @endguest
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold text-white mb-4">IELP Organization</h3>
                <p class="text-sm">Dedicated to alleviating poverty, providing essential education, and offering healthcare to those in need. Creating trust through transparency.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-orange-500 transition">About Us</a></li>
                    <li><a href="{{ route('team') }}" class="hover:text-orange-500 transition">Our Team</a></li>
                    <li><a href="{{ route('policies') }}" class="hover:text-orange-500 transition">Policies & Guidelines</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="hover:text-orange-500 transition">Beneficiary / Admin Login</a></li>
                    @endguest
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-orange-500 transition">Admin Dashboard</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Contact</h3>
                <p class="text-sm">Email: support@ielpu.org</p>
                <p class="text-sm">Phone: +1 (555) 123-4567</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-8 border-t border-gray-700 text-center text-sm">
            <p>&copy; {{ date('Y') }} IELP Organization. All rights reserved. | Built upon 100% Transparency.</p>
        </div>
    </footer>

</body>
</html>