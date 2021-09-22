<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'DK Log') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('seo')

    @if (Route::has('feeds.main'))
        @include('feed::links')
    @endif

    <!-- Theme Styles -->
    @foreach(\Phuclh\DKLog\DK::themeStyles() as $publicPath)
        <link rel="stylesheet" href="{{ $publicPath }}">
    @endforeach

    @livewireStyles

    <!-- Theme Scripts -->
    @foreach(\Phuclh\DKLog\DK::themeStyles() as $publicPath)
        <script src="{{ $publicPath }}" defer></script>
    @endforeach
</head>
<body class="font-sans antialiased dark:bg-black">

{{ $slot }}

<footer class="py-8 text-center text-sm text-gray-500 dark:text-blue-200">
    This site was built using <span class="text-gray-600 dark:text-white">DKLog</span>.

    @if (Route::has('feeds.main'))
        Follow the <a href="{{ url(config('feed.feeds.main.url')) }}" target="_blank" class="text-gray-600 hover:underline dark:text-white">RSS Feed</a>.
    @endif
</footer>

@stack('scripts')

</body>
</html>