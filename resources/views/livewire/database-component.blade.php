<div class="mx-auto" style="width: 1028px">
    <div class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
        <livewire:flash-message/>
        <form wire:submit.prevent="store">
            <!-- Organization Dropdown -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Organization</label>
                <select wire:model="organization_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Organization</option>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endforeach
                </select>
                @error('organization_id')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Description -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Description</label>
                <input type="text" wire:model="db_d" placeholder="Database Description"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_d')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Name</label>
                <input type="text" wire:model="db_name" placeholder="Database Name"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_name')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Host -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Host</label>
                <input type="text" wire:model="db_host" placeholder="Database Host"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_host')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Password</label>
                <input type="password" wire:model="db_password" placeholder="Database Password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_password')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Port -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Port</label>
                <input type="number" wire:model="db_port" placeholder="Database Port"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_port')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Database Prefix -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Database Prefix</label>
                <input type="text" wire:model="db_prefix" placeholder="Database Prefix"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('db_prefix')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
        <div class="overflow-x-auto mt-5">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md" style="width: 100%">
                <!-- Table Header -->
                <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Organization</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Host</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Port</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach($databases as $database)
                    <tr class="hover:bg-gray-50 border-b text-center">
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $database->organization->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $database->db_d }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $database->db_name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $database->db_host }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $database->db_port }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700 space-x-2">
                            <a href="{{ route('databases-edit', $database->id) }}"
                                    class="px-3 py-1 text-sm bg-blue-600 text-black rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Edit
                            </a>
                            <button wire:click="Delete({{ $database->id }})"
                                    class="px-3 py-1 text-sm bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
