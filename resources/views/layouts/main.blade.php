<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title') | Hospitality Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <x-navigation-menu />

    <header class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">@yield('header_title')</h1>
            <p class="mt-4 text-lg">@yield('header_description')</p>
        </div>
    </header>

    <main class="py-10">
        <div class="@yield('container_classes')">
            @yield('content')
        </div>
    </main>

    <x-footer />

</body>

@yield('alert')

</html>
