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
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @if (Session::has('status'))
        <div
            class="fixed flex flex-col justify-center w-full sm:w-120 top-1.5 lg:mt-2 right-0
                   left-0 [&>*:not(:first-child)]:mt-2 mx-auto px-2 z-50">
            <div role="alert"
                class="w-full p-3 rounded-lg ring-1 bg-blue-300 text-info-content ring-info-content fill-info-content shadow-xl"
                onclick="this.parentNode.remove()">
                <div class="flex flex-center">
                    <p class="grow flex justify-center items-center px-4 font-semibold text-center select-none">
                        {{ session('status') }}
                    </p>
                    <button class="block group text-3xl verical-align-middle" aria-label="close">
                        &times;
                    </button>
                </div>
            </div>
        </div>
    @endif

</body>
</html>
