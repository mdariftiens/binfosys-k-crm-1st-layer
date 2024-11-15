<div class="mx-auto" style="width: 1028px">
    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-md mt-5">
        <livewire:flash-message/>
        <form wire:submit.prevent="store">
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" id="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('name') <span class="mt-1 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" wire:model="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Optional">
                @error('address') <span class="mt-1 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" wire:model="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Optional">
                @error('phone') <span class="mt-1 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select wire:model="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option >Select Type</option>
                    <option value="individual">Individual</option>
                    <option value="company">Company</option>
                </select>
                @error('type') <span class="mt-1 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Web URL -->
            <div class="mb-4">
                <label for="web_url" class="block text-sm font-medium text-gray-700">Web URL</label>
                <input type="url" wire:model="web_url" id="web_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Optional">
                @error('web_url') <span class="mt-1 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md" style="width: 100%">
            <!-- Table Header -->
            <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">ID</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Name</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Address</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Phone</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Type</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Web URL</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Action</th>
            </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
            @foreach($organizations as $organization)
                <tr class="hover:bg-gray-50 border-b text-center">
                    <td class="px-4 py-2 text-gray-700">{{ $organization->id }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $organization->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $organization->address }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $organization->phone }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $organization->type }}</td>
                    <td class="px-4 py-2 text-gray-700">
                        <a href="{{ $organization->web_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">
                            {{ $organization->web_url }}
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <a href="{{ route('organizations.edit', $organization->id) }}"
                           class="inline-flex items-center px-3 py-1 text-sm bg-blue-600 text-black rounded-md hover:bg-blue-700 mr-2">
                            Edit
                        </a>
                        <button wire:click="organizationDelete({{ $organization->id }})"
                                class="px-3 py-1 text-sm bg-red-500 text-white rounded-md hover:bg-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
