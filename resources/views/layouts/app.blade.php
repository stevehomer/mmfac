<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Meet Me for a Coffee' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col" style="background:#f9f9f7">

    @include('layouts.navigation')

    @isset($header)
        <header style="background:white;border-bottom:1px solid #ddd" class="shadow-sm">
            <div class="max-w-6xl mx-auto px-4 py-4 sm:px-6">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="flex-1">
        {{ $slot }}
    </main>

    <footer style="background:#111;color:#555;font-size:0.72rem" class="px-4 py-3 flex flex-wrap justify-between gap-2">
        <span>Meet Me for a Coffee &copy; {{ date('Y') }}</span>
        <span class="flex gap-4">
            <a href="#" style="color:#777">About</a>
            <a href="#" style="color:#777">Privacy</a>
            <a href="#" style="color:#777">Contact</a>
        </span>
    </footer>

</body>
</html>
