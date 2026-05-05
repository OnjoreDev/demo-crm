<x-app-layout>
    <x-slot name="header">
        <h2>{{ $customer->name }}</h2>
    </x-slot>

    <div class="p-6 grid grid-cols-2 gap-6">

        {{-- CUSTOMER INFO --}}
        <div class="bg-white p-4 shadow">
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Company:</strong> {{ $customer->company }}</p>
            <p><strong>Status:</strong> {{ ucfirst($customer->status) }}</p>
            <p class="mt-2">{{ $customer->notes }}</p>
        </div>

        {{-- ADD INTERACTION --}}
        <div class="bg-white p-4 shadow">
            <h3 class="font-bold mb-2">Add Interaction</h3>

            <form method="POST" action="{{ route('interactions.store', $customer) }}" class="space-y-2">
                @csrf

                <select name="type" class="w-full border p-2">
                    <option value="call">Call</option>
                    <option value="email">Email</option>
                    <option value="meeting">Meeting</option>
                </select>

                <input type="date" name="interaction_date" class="w-full border p-2">

                <textarea name="notes" placeholder="Notes" class="w-full border p-2"></textarea>

                <button class="bg-green-500 text-white px-4 py-2">
                    Add Interaction
                </button>
            </form>
        </div>

        {{-- INTERACTIONS LIST --}}
        <div class="col-span-2 bg-white p-4 shadow">
            <h3 class="font-bold mb-4">Interactions</h3>

            @foreach($customer->interactions as $interaction)
                <div class="border-b py-2 flex justify-between">
                    <div>
                        <strong>{{ ucfirst($interaction->type) }}</strong>
                        <p>{{ $interaction->notes }}</p>
                        <small>{{ $interaction->interaction_date }}</small>
                    </div>

                    <form method="POST" action="{{ route('interactions.destroy', $interaction) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>