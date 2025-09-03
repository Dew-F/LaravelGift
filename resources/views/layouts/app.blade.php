<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    @livewireStyles
    <title>@yield('title')</title>
</head>

<body>
    <header class="max-w-7xl mx-auto px-8">
        <x-blocks.navigation />
    </header>
    <main class="max-w-7xl mx-auto px-4">
        @yield('content')
        <div class="bg-gray-100 min-h-32 flex justify-center items-center">
            <span>Остались вопросы - напишите нам Whats'App или позвоните <a>8-800-800-80-80</a></span>
        </div>
    </main>
    <footer class="max-w-7xl mx-auto py-4 px-8">
        <x-blocks.navigation />
        <div class="text-xs py-4">
            Сайт носит сугубо информационный характер и не является публичной офертой.
        </div>
        <div class="text-xs">
            ИП Попов П.П., ИНН 1234567890
        </div>
    </footer>

    @livewireScripts
</body>

</html>