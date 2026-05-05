<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Customers</h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('customers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Customer
        </a>

        <div class="mt-6 bg-white shadow rounded overflow-hidden">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Interactions</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($customers as $customer)
                <tr class="border-t">
                    <td class="p-3">
                        <a href="{{ route('customers.show', $customer) }}" class="text-blue-600">
                            {{ $customer->name }}
                        </a>
                    </td>

                    <td class="p-3">{{ $customer->email }}</td>

                    <td class="p-3">{{ $customer->phone }}</td>

                    <td class="p-3">{{ ucfirst($customer->status) }}</td>

                    <td class="p-3">{{ $customer->interactions_count ?? 0 }}</td>

                    <td class="p-3">
                        <div class="flex gap-2">
                            <a href="{{ route('customers.edit', $customer)}}" class="text-yellow-600">Edit</a>

                            <form method="POST" action="{{ route('customers.destroy', $customer) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        <div class="mt-4">
            {{ $customers->links() }}
        </div>

    </div>
</x-app-layout>