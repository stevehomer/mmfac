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

    <nav style="background:#2d5a3d;border-bottom:2px solid #1a3d28" class="h-12 flex items-center px-4">
        <a href="{{ route('home') }}" style="color:white;font-weight:700;font-size:0.95rem;text-decoration:none">
            ☕ Meet Me for a Coffee
        </a>
    </nav>

    <div class="flex-1 flex flex-col items-center justify-center py-10 px-4">
        <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-sm p-8">
            {{ $slot }}
        </div>
        <p class="mt-4 text-xs" style="color:#999">
            <a href="{{ route('home') }}" style="color:#2d5a3d">← Back to home</a>
        </p>
    </div>

    <footer style="background:#111;color:#555;font-size:0.72rem" class="px-4 py-3 text-center">
        Meet Me for a Coffee &copy; {{ date('Y') }}
    </footer>

</body>
</html>
