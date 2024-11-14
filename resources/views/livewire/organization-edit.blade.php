<div class="mx-auto" style="width: 1028px">
    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-md mt-5">
        <h2 class="text-xl font-semibold mb-4"></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-xl font-semibold mb-4">Edit Organisation</div>
            <div class="bg-green-500 p-4 text-right">
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('organizations') }}'" >
                    Back
                </button>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-green-700 bg-green-200 rounded-lg">
                {{ session('message') }}
            </div>
        @endif
        <form wire:submit.prevent="updateOrganization" class="space-y-4">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{$this->name}}">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" wire:model="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" wire:model="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Type</label>
                <select wire:model="type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="individual">Individual</option>
                    <option value="company">Company</option>
                </select>
                @error('type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Website URL</label>
                <input type="url" wire:model="web_url" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('web_url') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
