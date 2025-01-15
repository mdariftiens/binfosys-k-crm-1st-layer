<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-md mt-5">
    <livewire:flash-message/>
    <form wire:submit.prevent="store">
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


    <div class="overflow-x-auto mt-10">
        <table class="min-w-full bg-white border border-gray-200" style="width: 100%">
            <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Package Name</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Vendor Name</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Price</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Status</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(count($packages) > 0)
                @foreach($packages as $package)
                    <tr class="border-b hover:bg-gray-50 text-center">
                        <td class="px-4 py-2 text-gray-700">{{ $package->package_name}}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $package->vendor_name }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $package->price }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $package->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('package-edit', $package->id) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-black font-semibold py-1 px-3 rounded mr-2">
                                Edit
                            </a>
                            <button wire:click="delete({{ $package->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-b hover:bg-gray-50 text-center">
                    <td class="pt-2 pb-3" colspan="5">Package is not available</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</div>
