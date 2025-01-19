<!-- Formularz do usunięcia zwierzęcia -->
<form action="/pet" method="POST" class="space-y-6 mt-8">
    @csrf
    @method('DELETE')
    <h2 class="text-2xl font-semibold text-gray-700">Delete a Pet</h2>
    <div class="space-y-4">
        <input type="number" name="id" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Pet ID" required>
    </div>
    <button type="submit" class="w-full py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-200">Delete Pet</button>
</form>