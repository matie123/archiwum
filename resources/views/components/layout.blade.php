<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">
        @vite('resources/css/app.css')
        <title>{{ $title ?? '' }}</title>
    </head>
    <body class="bg-zinc-800 text-white flex flex-col min-h-screen m-0 xl:px-80 md:px-25 sm:px-5 px-0">
        <nav class="flex flex-row items-center bg-zinc-800 text-white vertical-center p-4 shadow-xl rounded-lg rounded-b-none">
            <a href="/" class="link:no_underline link:text-white"><h1 class="text-3xl">Archiwum</h1></a>
            <div class="ml-auto">
                <a href="/login"><button class="bg-zinc-800 hover:bg-zinc-700 hover:cursor-pointer px-5 py-3">Zaloguj się</button></a>
                <a href="/register"><button class="bg-zinc-800 hover:bg-zinc-700 hover:cursor-pointer px-5 py-3">Zarejestruj się</button></a>
            </div>
        </nav>
        <main class="flex flex-col items-center justify-center bg-zinc-700 text-white p-4 shadow-xl rounded-lg rounded-t-none">
            {{ $slot }}
        </main>
        <footer class="flex flex-col items-center justify-center bg-zinc-800 text-white p-4 mt-auto">
            <div class="bg-zinc-800 text-white p-4">
                <p>&copy; 2025 Archiwum. Wszelkie prawa zastrzeżone.</p>
                <p>Wszelkie pytania prosimy kierować na adres: <a href="mailto: archiwum.test.pl@gmail.com" class="link:no_underline link:text-white"></a></p>
        </footer>
    </body>
</html>