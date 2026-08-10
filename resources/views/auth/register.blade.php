<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Secure Authentication</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen font-sans text-slate-900 flex flex-col lg:flex-row w-full">

    <div class="hidden lg:flex flex-1 relative overflow-hidden bg-gradient-to-bl from-slate-900 via-orange-900 to-slate-900 items-center justify-center">
         <h2 class="text-4xl font-bold text-white z-10">Join Us Today</h2>
    </div>

    <div class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center space-y-2">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Create an account</h1>
                <p class="text-slate-500">Sign up to get started</p>
            </div>

            <div class="bg-white p-6 sm:p-8 rounded-lg shadow-sm border border-slate-200">
                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-medium text-slate-900">Full Name</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            </span>
                            <input id="name" name="name" type="text" placeholder="John Doe" value="{{ old('name') }}" class="w-full h-11 pl-10 pr-3 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 @error('name') border-red-500 focus:ring-red-500 @enderror" required autofocus>
                        </div>
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-slate-900">Email</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </span>
                            <input id="email" name="email" type="email" placeholder="name@example.com" value="{{ old('email') }}" class="w-full h-11 pl-10 pr-3 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 @error('email') border-red-500 focus:ring-red-500 @enderror" required>
                        </div>
                        @error('email')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-slate-900">Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <input id="password" name="password" type="password" placeholder="Create password" class="w-full h-11 pl-10 pr-10 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 @error('password') border-red-500 focus:ring-red-500 @enderror" required>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-sm font-medium text-slate-900">Confirm Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" class="w-full h-11 pl-10 pr-10 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300" required>
                        </div>
                    </div>

                    <button type="submit" class="w-full h-11 rounded-md font-medium text-white bg-orange-600 hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-xl active:translate-y-0 transition-all duration-300 shadow-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 flex items-center justify-center gap-2">
                        Sign up
                    </button>
                    
                    <div class="text-center text-sm text-slate-500 mt-4">
                        Already have an account? <a href="{{ route('login') }}" class="text-orange-600 hover:underline">Sign in here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
