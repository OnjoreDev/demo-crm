<x-app-layout>
     <x-slot name="header">
          <h2>Edit Customer</h2>
     </x-slot>
     <div class="p-6">
        <form method="POST" action="{{ route('customers.update',$customer->id) }}" class="space-y-4">
             @csrf
             @method('PUT')
            <input type="text" name="name" placeholder="Name" value="{{ old('name',$customer->name) }}"class="w-full border p-2">

            <input type="email" name="email" placeholder="Email" value="{{ old('email',$customer->email) }}" class="w-full border p-2">

            <input type="text" name="phone" placeholder="Phone" value="{{ old('phone',$customer->phone) }}" class="w-full border p-2">

            <input type="text" name="company" placeholder="Company" value="{{ old('company',$customer->company) }}" class="w-full border p-2">

            <select name="status" class="w-full p-2 border">
                <option value="lead" @selected($customer->status == 'lead')>lead</option>
                <option value="active" @selected($customer->status == 'active')>active</option>
                <option value="inactive" @selected($customer->status == 'inactive')>inactive</option>
            </select>

            <textarea name="notes" placeholder="notes" class="w-full border p-2">{{ $customer->notes }}</textarea>

            <button class="bg-blue-500 text-white px-4 py-2 "> Save</button>

        </form>
     </div>
</x-app-layout>