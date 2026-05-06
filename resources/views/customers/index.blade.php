<x-app-layout>
    <x-slot name="header">
        {{ __('Customers') }}
    </x-slot>

    <div class="space-y-6">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="flex items-center p-4 mb-4 text-emerald-800 border-t-4 border-emerald-300 bg-emerald-50 dark:text-emerald-400 dark:bg-zinc-900 dark:border-emerald-800 rounded-lg shadow-sm" role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Action Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-slate-900 dark:text-white">Customer Directory</h3>
            <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition duration-150 shadow-sm shadow-indigo-200 dark:shadow-none">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Customer
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white dark:bg-zinc-900 border border-slate-200 dark:border-zinc-800 rounded-xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-zinc-800/50 border-b border-slate-200 dark:border-zinc-800">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Customer Name</th>
                            <th class="px-6 py-4 font-semibold">Contact Info</th>
                            <th class="px-6 py-4 font-semibold text-center">Status</th>
                            <th class="px-6 py-4 font-semibold text-center">Interactions</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-zinc-800">
                        @if($customers->count() > 0)
                            @foreach($customers as $customer)
                                <tr class="hover:bg-slate-50 dark:hover:bg-zinc-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-700 dark:text-indigo-300 font-bold text-xs uppercase">
                                                {{ substr($customer->name, 0, 2) }}
                                            </div>
                                            <a href="{{ route('customers.show', $customer) }}" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                                                {{ $customer->name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 dark:text-slate-400">
                                        <div class="flex flex-col text-xs">
                                            <span class="text-slate-900 dark:text-slate-200 font-medium">{{ $customer->email }}</span>
                                            <span>{{ $customer->phone ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $statusClasses = match(strtolower($customer->status)) {
                                                'active' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                                                'lead' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                                default => 'bg-slate-100 text-slate-700 dark:bg-zinc-800 dark:text-slate-400',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses }}">
                                            {{ ucfirst($customer->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-zinc-800 px-2 py-1 rounded-md">
                                            {{ $customer->interactions_count ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('customers.edit', $customer)}}" class="text-slate-400 hover:text-indigo-600 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </a>
                                            <form method="POST" action="{{ route('customers.destroy', $customer) }}" onsubmit="return confirm('Delete this customer?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-slate-400 hover:text-red-600 transition">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                    No customers found. <a href="{{ route('customers.create') }}" class="text-indigo-600 underline">Add one now</a>.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $customers->links() }}
        </div>
    </div>
</x-app-layout>