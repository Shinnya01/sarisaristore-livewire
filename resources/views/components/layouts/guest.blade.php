<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Logo or header -->
        <div class="mb-6">
            <a href="{{ url('/') }}" class="flex flex-col items-center">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
                 <p>Sari-Sari Store</p>
            </a>
           
        </div>

        <!-- Main content -->
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>
</html>
