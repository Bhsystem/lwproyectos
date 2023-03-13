<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
<body>
    @auth
        {{auth()->user()}}
    @endauth

        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                           @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-responsive-nav-link>
        </form>
</body>
</html>