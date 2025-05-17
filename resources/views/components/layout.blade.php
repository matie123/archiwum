<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <link rel="stylesheet" href="@vite('resources/css/app.css')">
        <title>@yield('title')</title>
    </head>
    <body>
        <nav class="flex flex-row">
            <a href="/" class="link:no_underline link:text-white"><h1 class="text-3xl">Archiwum</h1></a>
            <div class="ml-auto">
                <a href="/login"><button class="bg-zinc-900 hover:bg-zinc-800">Zaloguj się</button></a>
                <a href="/register"><button class="bg-zinc-900 hover:bg-zinc-800">Zarejestruj się</button></a>
            </div>
        </nav>
    </body>
    <main>
        {{ $slot }}
    </main>
</html>