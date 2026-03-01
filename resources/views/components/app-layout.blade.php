<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Empowering Communities</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

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
                <a href="/login" class="text-gray-600 hover:text-blue-600 font-semibold">Login</a>
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
                    <li><a href="/login" class="hover:text-orange-500 transition">Beneficiary / Admin Login</a></li>
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