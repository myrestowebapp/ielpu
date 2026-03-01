<x-app-layout title="Login">
    <div class="max-w-md mx-auto my-16 bg-white p-8 border rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Login to IELP</h2>
        
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Email Address</label>
                <input type="email" name="email" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" required>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded font-semibold hover:bg-blue-700 transition">Login</button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition">Register here</a>
        </p>
    </div>
</x-app-layout>
