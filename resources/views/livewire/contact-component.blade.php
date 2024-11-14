<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-md mt-5">
    <livewire:flash-message/>
    <form wire:submit.prevent="store">
        <!-- Organization Dropdown -->
        <div class="mb-4">
            <label for="organization_id" class="block text-sm font-medium text-gray-700">Select Organization</label>
            <select wire:model="organization_id" id="organization_id" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="">Select Organization</option>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
            @error('organization_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" wire:model="name" id="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="email" id="email" placeholder="Email" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Phone Field -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" wire:model="phone" id="phone" placeholder="Phone" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Designation Field -->
        <div class="mb-4">
            <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
            <input type="text" wire:model="designation" id="designation" placeholder="Designation" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('designation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Address Field -->
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" wire:model="address" id="address" placeholder="Address" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>


    <div class="overflow-x-auto mt-10">
        <table class="min-w-full bg-white border border-gray-200" style="width: 100%">
            <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Organization</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Name</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Email</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Phone</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Designation</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr class="border-b hover:bg-gray-50 text-center">
                    <td class="px-4 py-2 text-gray-700">{{ $contact->organization->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $contact->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $contact->email }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $contact->phone }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $contact->designation }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('contact-edit', $contact->id) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-semibold py-1 px-3 rounded mr-2">
                            Edit
                        </a>
                        <button wire:click="contactDelete({{ $contact->id }})" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
