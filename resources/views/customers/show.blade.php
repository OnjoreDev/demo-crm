<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-500/20">
                {{ substr($customer->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white leading-tight">{{ $customer->name }}</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ $customer->company ?? 'Independent Client' }}</p>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- LEFT/MIDDLE: Timeline & Activity -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- ADD INTERACTION CARD -->
            <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm p-6">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Log New Interaction
                </h3>

                <form method="POST" action="{{ route('interactions.store', $customer) }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Type</label>
                        <select name="type" class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="call">📞 Phone Call</option>
                            <option value="email">📧 Email Sent</option>
                            <option value="meeting">🤝 In-Person Meeting</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Date</label>
                        <input type="date" name="interaction_date" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Discussion Notes</label>
                        <textarea name="notes" rows="3" placeholder="What did you talk about?" class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="md:col-span-2 flex justify-end">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-semibold transition shadow-sm">
                            Save Interaction
                        </button>
                    </div>
                </form>
            </div>

            <!-- INTERACTIONS LIST / TIMELINE -->
            <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm p-6">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Activity Timeline</h3>

                <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-slate-200 before:via-slate-200 before:to-transparent dark:before:from-zinc-800 dark:before:via-zinc-800">
                    @forelse($customer->interactions->sortByDesc('interaction_date') as $interaction)
                        <div class="relative flex items-start gap-4">
                            <!-- Icon -->
                            <div class="relative flex items-center justify-center w-10 h-10 rounded-full bg-white dark:bg-zinc-900 border-2 border-indigo-500 text-indigo-500 shrink-0 z-10">
                                @if($interaction->type == 'call') 📞 @elseif($interaction->type == 'email') 📧 @else 🤝 @endif
                            </div>
                            
                            <div class="flex-1 bg-slate-50 dark:bg-zinc-800/50 rounded-xl p-4 border border-slate-100 dark:border-zinc-700">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-bold text-slate-900 dark:text-white uppercase text-xs tracking-wider">
                                        {{ $interaction->type }}
                                    </h4>
                                    <span class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($interaction->interaction_date)->format('M d, Y') }}</span>
                                </div>
                                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                    {{ $interaction->notes }}
                                </p>
                                
                                <div class="mt-3 flex justify-end">
                                    <form method="POST" action="{{ route('interactions.destroy', $interaction) }}" onsubmit="return confirm('Remove this log?');">
                                        @csrf @method('DELETE')
                                        <button class="text-xs text-slate-400 hover:text-red-500 transition">Delete Log</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-slate-500 py-4">No interactions recorded yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- RIGHT SIDEBAR: Customer Details -->
        <div class="space-y-6">
            <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm overflow-hidden">
                <div class="bg-slate-50 dark:bg-zinc-800/50 px-6 py-4 border-b border-slate-200 dark:border-zinc-800">
                    <h3 class="font-bold text-slate-900 dark:text-white">Contact Details</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Email Address</label>
                        <p class="text-slate-900 dark:text-slate-200 break-all">{{ $customer->email }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Phone Number</label>
                        <p class="text-slate-900 dark:text-slate-200">{{ $customer->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Current Status</label>
                        <div class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-800">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </div>
                    </div>
                    @if($customer->notes)
                    <div class="pt-4 border-t border-slate-100 dark:border-zinc-800">
                        <label class="text-xs font-bold text-slate-400 uppercase">General Notes</label>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mt-1 leading-relaxed">{{ $customer->notes }}</p>
                    </div>
                    @endif
                </div>
                <div class="px-6 py-4 bg-slate-50 dark:bg-zinc-800/50 flex gap-2">
                    <a href="{{ route('customers.edit', $customer) }}" class="flex-1 text-center text-sm font-semibold bg-white dark:bg-zinc-700 border border-slate-200 dark:border-zinc-600 py-2 rounded-lg hover:bg-slate-50 transition">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>