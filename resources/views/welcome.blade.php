@section('title', 'Archiwum | Strona główna');
@section('description', 'Witamy w Archiwum. Znajdziesz tutaj różnorodne pliki i zasoby do pobrania. Przeglądaj, pobieraj i korzystaj z naszych zasobów.')
@section('keywords', 'archiwum, pliki, zasoby, pobieranie, przeglądanie, korzystanie')
<x-layout>
    <p>Czemuż ten diabelski tailwind nie działa? Do diaska z niem!</p>
    <table class="border">
        <tr>
            <td>Nazwa pliku</td>
            <td>Opis</td>
            <td>Autor</td>
        </tr>
        @foreach ($files as $file)
            <tr>
                <td><a href="/files/{{ $file['id'] }}">{{ $file['name'] }}</a></td>
                <td>{{ $file['description'] }}</td>
                <td>{{ $file['author'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>
