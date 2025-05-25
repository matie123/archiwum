<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">
        @vite('resources/css/app.css')
        <title>{{ $title ?? '' }}</title>
    </head>
    <body class="flex flex-col min-h-screen px-0 m-0 subpixel-antialiased text-white bg-zinc-800 xl:px-80 md:px-25 sm:px-5">
        <nav class="flex flex-row items-center p-4 text-white rounded-lg rounded-b-none shadow-xl bg-zinc-800 vertical-center">
            <div class="flex justify-start flex-1">
                <a href="/" class="link:no_underline link:text-white">
                    <h1 class="text-4xl">Archiwum</h1>
                </a>
            </div>
            <div class="flex items-center justify-center flex-1 text-2xl">
                @if(Auth::check())
                    <h1>Jesteś zalogowany jako: {{ Auth::user()->name }}</h1>
                @endif
            </div>
            <div class="flex justify-end flex-1">
                @if(!Auth::check())
                    <a href="/login"><button class="transition-transform duration-200 navButton hover:scale-101">Zaloguj się</button></a>
                    <a href="/register"><button class="ml-2 transition-transform duration-200 navButton hover:scale-101">Zarejestruj się</button></a>
                @else
                    <a href="/addFile"><button class="ml-2 transition-transform duration-200 navButton hover:scale-101">Dodaj plik</button></a>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="ml-2 transition-transform duration-200 navButton hover:scale-101">Wyloguj się</button>
                    </form>
                @endif
            </div>
        </nav>
        <main class="flex flex-col items-center justify-center p-4 text-lg text-white rounded-lg rounded-t-none shadow-xl bg-zinc-700">
            {{ $slot }}
        </main>
        <footer class="flex flex-col items-center justify-center p-4 mt-auto text-white bg-zinc-800">
            <div class="p-4 text-lg text-white bg-zinc-800">
                <p class="text-center">&copy; 2025 Archiwum. Wszelkie prawa zastrzeżone.</p>
                <p>Wszelkie pytania prosimy kierować na adres: <a href="mailto: archiwum.test.pl@gmail.com" class="link:no_underline link:text-white">archiwum.test.pl@gmail.com</a></p>
        </footer>
    </body>
</html>