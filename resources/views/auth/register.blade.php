<x-app-layout title="Register">
    <div class="max-w-md mx-auto my-16 bg-white p-8 border rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>
        
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" value="{{ old('name') }}" required autofocus>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Email Address</label>
                <input type="email" name="email" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" value="{{ old('email') }}" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">I want to...</label>
                <select name="role" class="w-full border p-2 rounded focus:ring focus:ring-blue-200 focus:outline-none" required>
                    <option value="donor">Donate & Help Others (Donor)</option>
                    <option value="beneficiary">Request Help (Beneficiary)</option>
                </select>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded font-semibold hover:bg-blue-700 transition">Register</button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition">Login here</a>
        </p>
    </div>
</x-app-layout>
