<form action="/pet" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    <h2 class="text-2xl font-semibold text-gray-700">Update Pet</h2>

    <div class="space-y-4">
        <!-- Name of the pet -->
        <input type="text" name="id" value="{{ old('id') }}"
            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-black"
            placeholder="Pet id" required>
        @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="space-y-4">
            <!-- Name of the pet -->
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-black"
                placeholder="Pet Name" required>
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Category Name -->
            <input type="text" name="category" value="{{ old('category') }}"
                class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                placeholder="Category Name" required>
            @error('category')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Photo URLs -->
            <input type="text" name="photoUrls" value="{{ old('photoUrls') }}"
                class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                placeholder="Photo URLs (separated by semicolons)" required>
            @error('photoUrls')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Tags -->
            <input type="text" name="tags" value="{{ old('tags') }}"
                class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                placeholder="Tags (separated by semicolons)" required>
            @error('tags')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Status -->
            <select name="status" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition duration-200">Update Pet</button>
</form>