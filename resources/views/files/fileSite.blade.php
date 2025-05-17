<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="@vite('resources/css/app.css')">
    <title>Archiwum | Plik</title>
</head>
<body>
    <nav class="flex flex-row">
        <a href="/"><h1 class="text-3xl">Archiwum</h1></a>
        <div class="ml-auto">
            <a href="/login"><button class="bg-slate-900 hover:bg-slate-800">Zaloguj się</button></a>
            <a href="/register"><button class="bg-slate-900 hover:bg-slate-800">Zarejestruj się</button></a>
        </div>
    </nav>
    <main>
        <h1>Plik</h1>
    </main>
</body>
</html>