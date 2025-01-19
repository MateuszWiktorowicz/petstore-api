<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pets - Api</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Link do CDN Tailwind CSS -->
</head>

<body>
    <main class="mt-6">
        @include('ApiForms.getPetByIdForm')
        @include('ApiForms.createPetForm')
        @include('ApiForms.deletePetForm')
        @include('ApiForms.updatePetForm')
    </main>

    <footer class="py-16 text-center text-sm text-black">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>


</body>

</html>