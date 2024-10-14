<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen">
        <!-- Bagian Kiri: Latar Belakang Hijau -->
        <div class="w-1/2 bg-green-600 flex items-center justify-center">
            <img src="{{ asset('images/Order food.gif') }}" alt="Descriptive Image" class="object-contain h-2/3 w-2/3" />
        </div>

        <!-- Bagian Kanan: Konten Formulir -->
        <div class="w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8">
                <div class="mb-4 text-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
