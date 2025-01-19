<!-- Formularz do wyszukiwania zwierzęcia -->
<form action="/pet" method="get" class="space-y-6 mt-8">
    <h2 class="text-2xl font-semibold text-gray-700">Find Pet by ID</h2>
    <div class="space-y-4">
        <input type="number" id="petId" name="id" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Enter Pet ID" required>
    </div>
    <button type="submit" class="w-full py-3 text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 transition duration-200">Find Pet</button>
</form>