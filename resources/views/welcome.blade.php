<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="@vite('resources/css/app.css')">
    <title>Archiwum | Logowanie</title>
</head>
<body>
    <nav class="flex flex-row">
        <a href="/" class="link:no_underline link:text-white"><h1 class="text-3xl">Archiwum</h1></a>
        <div class="ml-auto">
            <a href="/login"><button class="bg-zinc-900 hover:bg-zinc-800">Zaloguj się</button></a>
            <a href="/register"><button class="bg-zinc-900 hover:bg-zinc-800">Zarejestruj się</button></a>
        </div>
    </nav>
    <main>
        <p>Czemuż ten diabelski tailwind nie działa? Do diaska z niem!</p>
        <table class="border">
            <tr>
                <td>Nazwa pliku</td>
                <td>Opis</td>
                <td>Autor</td>
            </tr>
            @foreach($files as $file)
                <tr>
                <td><a href="/files/{{$file["id"]}}">{{$file["name"]}}</a></td>
                <td>{{$file["description"]}}</td>
                <td>{{$file["author"]}}</td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>