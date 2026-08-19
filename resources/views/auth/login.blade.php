<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Secure Authentication</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen font-sans text-slate-900 flex flex-col lg:flex-row w-full">

    <div class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center space-y-2">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Welcome back</h1>
                <p class="text-slate-500">Sign in to your account to continue</p>
            </div>

            <div class="bg-white p-6 sm:p-8 rounded-lg shadow-sm border border-slate-200">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-slate-900">Email</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </span>
                            <input id="email" name="email" type="email" placeholder="name@example.com" value="{{ old('email') }}" class="w-full h-11 pl-10 pr-3 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 @error('email') border-red-500 focus:ring-red-500 @enderror" required autofocus>
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
                            <input id="password" name="password" type="password" placeholder="Enter password" class="w-full h-11 pl-10 pr-10 rounded-md border border-slate-300 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 @error('password') border-red-500 focus:ring-red-500 @enderror" required>
                            <button type="button" id="togglePasswordVisibilityBtn" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                <svg id="eye-off-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label for="remember" class="flex items-center space-x-2 cursor-pointer">
                            <input id="remember" name="remember" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-orange-600 focus:ring-orange-500">
                            <span class="text-slate-500 select-none text-sm">Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full h-11 rounded-md font-medium text-white bg-orange-600 hover:bg-orange-700 transition-all duration-300 shadow-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 flex items-center justify-center gap-2">
                        Sign in
                    </button>
                    
                    <div class="text-center text-sm text-slate-500 mt-4">
                        Don't have an account? <a href="{{ route('register') }}" class="text-orange-600 hover:underline">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="hidden lg:flex flex-1 relative overflow-hidden bg-gradient-to-br from-slate-900 via-orange-900 to-slate-900 items-center justify-center">
         <h2 class="text-4xl font-bold text-white z-10">Secure Authentication</h2>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
