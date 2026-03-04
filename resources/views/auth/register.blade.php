<x-app-layout title="Register">
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-20 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full filter blur-3xl opacity-50 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent/5 rounded-full filter blur-3xl opacity-50 -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10">
            <div class="text-center mb-10">
                <span class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary font-bold tracking-widest text-[10px] uppercase mb-4">Join our community</span>
                <h2 class="text-4xl font-black text-gray-900 font-serif italic mb-2">Create an <span class="text-accent underline underline-offset-4 decoration-accent/20">Account.</span></h2>
                <p class="text-sm text-gray-400 font-medium italic">Start making an impact today through transparent giving.</p>
            </div>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md relative z-10">
            <div class="bg-white py-12 px-10 shadow-2xl shadow-gray-200/50 rounded-3xl border border-gray-100 sm:px-12">
                
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-5 rounded-r-xl">
                        <ul class="text-red-600 font-medium text-xs space-y-1 italic">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="space-y-8" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="name" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Full Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus class="appearance-none block w-full px-5 py-4 border border-gray-100 rounded-xl bg-gray-50/50 text-gray-900 font-serif italic focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder-gray-200">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="email" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Email Address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="appearance-none block w-full px-5 py-4 border border-gray-100 rounded-xl bg-gray-50/50 text-gray-900 font-serif italic focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder-gray-200">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="password" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Password</label>
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-5 py-4 border border-gray-100 rounded-xl bg-gray-50/50 text-gray-900 font-serif italic focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder-gray-200">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Confirm</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-5 py-4 border border-gray-100 rounded-xl bg-gray-50/50 text-gray-900 font-serif italic focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder-gray-200">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="role" class="block text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">I want to...</label>
                        <select id="role" name="role" required class="appearance-none block w-full px-5 py-4 border border-gray-100 rounded-xl bg-gray-50/50 text-gray-900 font-serif italic focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all cursor-pointer">
                            <option value="donor">Contribute & Help Others</option>
                            <option value="beneficiary">Register as a Beneficiary</option>
                        </select>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-5 px-6 rounded-2xl font-bold text-sm text-white uppercase tracking-widest bg-primary hover:bg-primary-dark shadow-xl shadow-primary/20 transition-all focus:outline-none">
                            Register Member
                        </button>
                    </div>
                </form>

                <div class="mt-12 pt-8 border-t border-gray-50 text-center">
                    <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest mb-6">Already have an account?</p>
                    <a href="{{ route('login') }}" class="inline-flex items-center text-accent hover:text-accent-dark font-bold text-sm uppercase tracking-widest transition-all">
                        Login to Access
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
