<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Laravel' }}</title>


    @stack('before-style')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('after-style')
</head>

<body class="font-sans antialiased">

    @include('includes.navbar')


    <div class="min-h-screen">
        <main>
            {{ $slot }}
        </main>
    </div>


    @include('includes.footer')
    @stack('before-script')
    @livewireScripts

    <script>
        feather.replace();
    </script>
    @stack('after-script')
</body>

</html>
