<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts - Consistent with Welcome and App layouts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 dark:text-slate-100 bg-slate-50 dark:bg-zinc-950">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <!-- Branding/Logo Area -->
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex flex-col items-center gap-3 group">
                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">{{ config('app.name', 'SimpleCRM') }}</span>
                </a>
            </div>

            <!-- Auth Card -->
            <div class="w-full sm:max-w-md px-8 py-10 bg-white dark:bg-zinc-900 shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-200 dark:border-zinc-800 overflow-hidden sm:rounded-2xl">
                <div class="mb-6">
                    {{-- This is a nice spot for a dynamic message if you want to add one later --}}
                    <p class="text-sm text-slate-500 dark:text-slate-400">Please enter your details to continue.</p>
                </div>

                {{ $slot }}
            </div>

            <!-- Simple Footer Link -->
            <div class="mt-8">
                <a href="/" class="text-sm font-medium text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Back to home
                </a>
            </div>
        </div>
    </body>
</html>