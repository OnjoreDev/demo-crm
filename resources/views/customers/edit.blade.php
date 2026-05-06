<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('customers.index') }}" class="text-slate-400 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Customer</h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form method="POST" action="{{ route('customers.update', $customer->id) }}" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <!-- Section: Basic Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $customer->name) }}" 
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="e.g. John Doe">
                        @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $customer->email) }}" 
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" 
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="+1 (555) 000-0000">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Company</label>
                        <input type="text" name="company" value="{{ old('company', $customer->company) }}" 
                            class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="Acme Corp">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Relationship Status</label>
                        <select name="status" class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white">
                            <option value="lead" @selected($customer->status == 'lead')>Lead</option>
                            <option value="active" @selected($customer->status == 'active')>Active Client</option>
                            <option value="inactive" @selected($customer->status == 'inactive')>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Section: Notes -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">Internal Notes</label>
                    <textarea name="notes" rows="4" 
                        class="w-full rounded-lg border-slate-200 dark:border-zinc-700 dark:bg-zinc-800 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                        placeholder="Add any relevant background information here...">{{ old('notes', $customer->notes) }}</textarea>
                </div>

                <!-- Form Footer -->
                <div class="pt-6 border-t border-slate-100 dark:border-zinc-800 flex items-center justify-end gap-4">
                    <a href="{{ route('customers.show', $customer) }}" class="text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition duration-150 shadow-sm shadow-indigo-200 dark:shadow-none">
                        Update Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>