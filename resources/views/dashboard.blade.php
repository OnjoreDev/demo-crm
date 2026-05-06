<x-app-layout>
    <x-slot name="header">
        {{ __('Analytics Dashboard') }}
    </x-slot>

    <div class="space-y-8">
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Customers -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Customers</p>
                <div class="flex items-end justify-between mt-2">
                    <h4 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['total_customers'] }}</h4>
                    <span class="p-2 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </span>
                </div>
            </div>

            <!-- Active Leads -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Active Leads</p>
                <div class="flex items-end justify-between mt-2">
                    <h4 class="text-3xl font-bold text-amber-600">{{ $stats['active_leads'] }}</h4>
                    <span class="p-2 bg-amber-50 dark:bg-amber-900/30 rounded-lg text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </span>
                </div>
            </div>

            <!-- Interactions (30 Days) -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Interactions (30d)</p>
                <div class="flex items-end justify-between mt-2">
                    <h4 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['recent_interactions'] }}</h4>
                    <span class="p-2 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </span>
                </div>
            </div>

            <!-- Total Activity -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Actions</p>
                <div class="flex items-end justify-between mt-2">
                    <h4 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['total_interactions'] }}</h4>
                    <span class="p-2 bg-slate-50 dark:bg-zinc-800 rounded-lg text-slate-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Status Breakdown -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Customer Status</h3>
                <div class="space-y-4">
                    @foreach($statusDistribution as $item)
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="capitalize text-slate-600 dark:text-slate-400">{{ $item->status }}</span>
                                <span class="font-bold text-slate-900 dark:text-white">{{ $item->total }}</span>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-zinc-800 rounded-full h-2">
                                @php 
                                    $percentage = ($stats['total_customers'] > 0) ? ($item->total / $stats['total_customers']) * 100 : 0;
                                @endphp
                                <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Activity Feed -->
            <div class="lg:col-span-2 bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Latest Interactions</h3>
                <div class="flow-root">
                    <ul role="list" class="-mb-8">
                        @forelse($recentActivity as $activity)
                            <li>
                                <div class="relative pb-8">
                                    @if (!$loop->last)
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-slate-200 dark:bg-zinc-800"></span>
                                    @endif
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center ring-8 ring-white dark:ring-zinc-900">
                                                <span class="text-xs">
                                                    @if($activity->type == 'call') 📞 @elseif($activity->type == 'email') 📧 @else 🤝 @endif
                                                </span>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                                    {{ ucfirst($activity->type) }} with 
                                                    <a href="{{ route('customers.show', $activity->customer) }}" class="font-bold text-slate-900 dark:text-white hover:text-indigo-600">
                                                        {{ $activity->customer->name }}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-xs text-slate-500">
                                                {{ \Carbon\Carbon::parse($activity->interaction_date)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p class="text-sm text-slate-500">No recent activity found.</p>
                        @endforelse
                    </ul>
                </div>
                <div class="mt-6">
                    <a href="{{ route('customers.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">View all customers &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>