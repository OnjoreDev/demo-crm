<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts - Matched to Welcome Page -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 dark:text-slate-100 bg-slate-50 dark:bg-zinc-950">
        <div class="min-h-screen">
            <!-- Navigation Wrapper -->
            <div class="sticky top-0 z-40">
                @include('layouts.navigation')
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-zinc-900 border-b border-slate-200 dark:border-zinc-800">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between">
                            <!-- Title & Subtitle logic -->
                            <div>
                                <h1 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                                    {{ $header }}
                                </h1>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                    Manage your CRM operations and view real-time analytics.
                                </p>
                            </div>
                            
                            <!-- Action Button (Optional placeholder) -->
                            <div class="hidden sm:block">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition duration-150 shadow-sm shadow-indigo-500/20">
                                    Refresh Analytics
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>