<div>
    <form wire:submit.prevent="update" class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
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
</div>
