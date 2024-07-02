<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="{{ asset('assets/css/style_for_breeze_app.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('geeks/assets/libs/glightbox/dist/css/glightbox.min.css') }}">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Charymyrat" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('geeks/assets/images/favicon/favicon.ico') }}" />
        <link href="{{ asset('geeks/assets/fonts/feather/feather.css') }}" rel="stylesheet" />
        <link href="{{ asset('geeks/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('geeks/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('geeks/assets/css/theme.min.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
