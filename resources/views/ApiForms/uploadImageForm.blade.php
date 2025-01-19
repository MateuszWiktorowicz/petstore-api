<form action="pet/upload" method="POST" enctype="multipart/form-data" class="space-y-6 mt-8">
    @csrf
    <h2 class="text-2xl font-semibold text-gray-700">Upload Image</h2>
    <div>
        <input type="number" name="id" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Pet ID" required>
        @error('id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="file" name="file" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        @error('file')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="text" name="additionalMetadata" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Additional Metadata">
        @error('additionalMetadata')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="w-full py-3 text-white bg-purple-600 rounded-lg hover:bg-purple-700 transition duration-200">Upload Image</button>
</form>