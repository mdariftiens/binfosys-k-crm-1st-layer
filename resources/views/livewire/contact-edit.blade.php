<div class="mt-5">
    <form wire:submit.prevent="update" class="max-w-lg mx-auto p-6 bg-white rounded shadow space-y-4">
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
</div>
