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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if (session()->has('success'))
                    <div
                        class="mb-4 rounded-lg my-3 bg-green-100 border border-green-300 text-green-800 px-4 py-3 flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="font-bold">×</button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div
                        class="mb-4 rounded-lg my-4 bg-red-100 border border-red-300 text-red-800 px-4 py-3 flex justify-between items-center">
                        <span>{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="font-bold">×</button>
                    </div>
                @endif

                @if (session()->has('warning'))
                    <div
                        class="mb-4 rounded-lg bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 flex justify-between items-center">
                        <span>{{ session('warning') }}</span>
                        <button onclick="this.parentElement.remove()" class="font-bold">×</button>
                    </div>
                @endif

                @if (session()->has('info'))
                    <div
                        class="mb-4 rounded-lg bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 flex justify-between items-center">
                        <span>{{ session('info') }}</span>
                        <button onclick="this.parentElement.remove()" class="font-bold">×</button>
                    </div>
                @endif
            </div>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
