<x-app-layout title="Register">
    <div class="min-h-screen bg-genz-cyan/20 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-4xl font-black text-genz-dark tracking-tight">Join <span class="bg-genz-pink text-white px-2 transform rotate-2 inline-block shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] border-2 border-genz-dark">IELP</span></h2>
            <p class="mt-2 text-center text-sm text-gray-600 font-bold uppercase tracking-widest">
                Start making an impact today 🌍
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-brutal border-4 border-genz-dark rounded-2xl sm:px-10 mb-8">
                
                @if ($errors->any())
                    <div class="mb-6 bg-genz-pink/10 border-4 border-genz-pink p-4 rounded-xl shadow-[4px_4px_0px_0px_rgba(236,72,153,1)]">
                        <ul class="list-disc pl-5 text-genz-dark font-bold text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Full Name</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus class="appearance-none block w-full px-4 py-3 border-2 border-gray-300 rounded-xl bg-gray-50 text-genz-dark font-bold focus:outline-none focus:ring-0 focus:border-genz-cyan sm:text-lg transition-colors placeholder-gray-400">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Email Address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required class="appearance-none block w-full px-4 py-3 border-2 border-gray-300 rounded-xl bg-gray-50 text-genz-dark font-bold focus:outline-none focus:ring-0 focus:border-genz-cyan sm:text-lg transition-colors placeholder-gray-400">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-4 py-3 border-2 border-gray-300 rounded-xl bg-gray-50 text-genz-dark font-bold focus:outline-none focus:ring-0 focus:border-genz-cyan sm:text-lg transition-colors placeholder-gray-400">
                        </div>
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">Confirm Password</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-4 py-3 border-2 border-gray-300 rounded-xl bg-gray-50 text-genz-dark font-bold focus:outline-none focus:ring-0 focus:border-genz-cyan sm:text-lg transition-colors placeholder-gray-400">
                        </div>
                    </div>
                    
                    <div>
                        <label for="role" class="block text-sm font-black text-genz-dark uppercase tracking-widest mb-2">I want to...</label>
                        <div class="mt-1">
                            <select id="role" name="role" required class="appearance-none block w-full px-4 py-3 border-2 border-gray-300 rounded-xl bg-gray-50 text-genz-dark font-bold focus:outline-none focus:ring-0 focus:border-genz-cyan sm:text-lg transition-colors cursor-pointer">
                                <option value="donor">Donate & Help Others (Donor)</option>
                                <option value="beneficiary">Request Help (Beneficiary)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-4 px-4 rounded-xl shadow-[4px_4px_0px_0px_rgba(15,23,42,1)] text-lg font-black text-genz-dark uppercase tracking-wider bg-genz-cyan hover:bg-cyan-400 hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[2px] hover:translate-y-[2px] transition-all border-2 border-genz-dark">
                            Create Account
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500 font-bold uppercase tracking-widest">
                                Already have an account?
                            </span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('login') }}" class="w-full flex justify-center py-4 px-4 rounded-xl shadow-[4px_4px_0px_0px_rgba(15,23,42,1)] text-lg font-black text-white uppercase tracking-wider bg-genz-purple hover:bg-purple-600 hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[2px] hover:translate-y-[2px] transition-all border-2 border-genz-dark">
                            Login Here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
