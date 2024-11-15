<div>
    @if(session()->has('success'))
        <div class="mb-5" style="margin-bottom: 16px;">
            <div x-data="{ open: true }" x-show="open" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" style="color: green">
                <span class="block sm:inline text-green-700">{{ session('success') }}</span>
            </div>
        </div>
    @endif
</div>
