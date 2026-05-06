<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('customers.index') }}" class="text-slate-400 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Customer</h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-zinc-800">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Customer Profile</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Fill in the primary contact details for your new lead or client.</p>
            </div>

            <form method="POST" action="{{ route('customers.store') }}" class="p-8 space-y-6">
                @csrf

                <!-- Grid for Name and Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm"
                            placeholder="e.g. Alex Johnson">
                        @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm"
                            placeholder="alex@company.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm"
                            placeholder="+1 (555) 000-0000">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Company Name</label>
                        <input type="text" name="company" value="{{ old('company') }}"
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm"
                            placeholder="Acme Inc.">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Initial Status</label>
                        <select name="status" class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm">
                            <option value="lead">New Lead</option>
                            <option value="active">Active Customer</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Notes Section -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Initial Notes</label>
                    <textarea name="notes" rows="4" 
                        class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white shadow-sm"
                        placeholder="Add some context about this customer...">{{ old('notes') }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-slate-100 dark:border-zinc-800 flex items-center justify-end gap-4">
                    <a href="{{ route('customers.index') }}" class="text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 transition">
                        Discard
                    </a>
                    <button type="submit" class="inline-flex items-center px-8 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition duration-150 shadow-lg shadow-indigo-500/20 dark:shadow-none">
                        Create Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>