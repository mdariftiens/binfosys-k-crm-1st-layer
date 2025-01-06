<div class="mt-5">
    <form wire:submit.prevent="update" class="max-w-lg mx-auto p-6 bg-white rounded shadow space-y-4">
        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" wire:model="package_name" id="package_name" placeholder="Package name"
                   class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('package_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="text" class="block text-sm font-medium text-gray-700">Vendor Name</label>
            <input type="text" wire:model="vendor_name" id="vendor_name" placeholder="Vendor Name"
                   class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('vendor_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Phone Field -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Package Price</label>
            <input type="number" wire:model="price" id="price" placeholder="price"
                   class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Status Field -->
        <div class="mb-4">
            <label for="organization_id" class="block text-sm font-medium text-gray-700">Active Status</label>
            <select wire:model="status" id="status" class="mt-1 block w-full border-gray-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="">Select Status</option>
                <option value="1">Active</option>
                <option value="0">In Active</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>
