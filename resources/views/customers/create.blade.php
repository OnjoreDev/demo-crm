<x-app-layout>
     <x-slot name="header">
          <h2>Add Customer</h2>
     </x-slot>
     <div class="p-6 shadow">
        <form method="POST" action="{{ route('customers.create') }}" class="space-y-4">
             @csrf
            <input type="text" name="name" placeholder="Name" class="w-full border p-2">

            <input type="email" name="email" placeholder="Email" class="w-full border p-2">

            <input type="text" name="phone" placeholder="Phone" class="w-full border p-2">

            <input type="text" name="company" placeholder="Company" class="w-full border p-2">

            <select name="status" class="w-full p-2 border">
                <option value="lead">lead</option>
                <option value="active">active</option>
                <option value="inactive">inactive</option>
            </select>

            <textarea name="notes" placeholder="notes" class="w-full border p-2"></textarea>

            <button class="bg-blue-500 text-white px-4 py-2 "> Save</button>

        </form>
     </div>
</x-app-layout>