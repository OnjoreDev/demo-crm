<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel CRM') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 dark:bg-zinc-950 font-sans text-slate-900 dark:text-slate-100">

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 w-full bg-white/80 dark:bg-zinc-900/80 backdrop-blur-md border-b border-slate-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight">{{ config('app.name', 'SimpleCRM') }}</span>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-indigo-600 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-indigo-600 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-indigo-500/20">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main>
        <div class="relative overflow-hidden pt-16 pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <span class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-indigo-600 uppercase bg-indigo-50 dark:bg-indigo-900/30 rounded-full">
                        CRM built for simplicity
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-8">
                        Manage your clients <br/>
                        <span class="text-indigo-600">without the headache.</span>
                    </h1>
                    <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 dark:text-slate-400 mb-10">
                        The simple, all-in-one CRM for small teams. Track leads, manage projects, and grow your business with a platform that stays out of your way.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/25">
                            Start for free
                        </a>
                        <a href="#features" class="px-8 py-4 bg-white dark:bg-zinc-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-zinc-700 rounded-xl font-bold text-lg hover:bg-slate-50 transition">
                            View Demo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Decorative background blob -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-0 opacity-30 pointer-events-none">
                <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-indigo-300 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-300 rounded-full blur-[120px]"></div>
            </div>
        </div>

        <!-- Mini Features Grid -->
        <div id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-lg flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Lead Tracking</h3>
                    <p class="text-slate-600 dark:text-slate-400">Never lose a potential customer again with our intuitive funnel management.</p>
                </div>
                <div class="p-8 bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Sales Analytics</h3>
                    <p class="text-slate-600 dark:text-slate-400">Beautifully visualized data helps you understand exactly how your business is growing.</p>
                </div>
                <div class="p-8 bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                    <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/50 rounded-lg flex items-center justify-center text-teal-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Secure Data</h3>
                    <p class="text-slate-600 dark:text-slate-400">Your data is encrypted and backed up daily. Privacy is our top priority.</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="border-t border-slate-200 dark:border-zinc-800 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved. Built with Laravel.
        </div>
    </footer>
</body>
</html>