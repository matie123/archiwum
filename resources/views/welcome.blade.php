<x-layout 
    title="Archiwum | Strona główna"
    description="Witamy w Archiwum. Znajdziesz tutaj różnorodne pliki i zasoby do pobrania. Przeglądaj, pobieraj i korzystaj z naszych zasobów."
    keywords="archiwum, pliki, zasoby, pobieranie, przeglądanie, korzystanie"
>
    <p>Czemuż ten diabelski tailwind nie działa? Do diaska z niem!</p>
    <table class="border-collapse border border-slate-500 w-full text-lg">
        <thead class="bg-slate-600">
            <tr>
                <td class="border border-slate-400">Nazwa pliku</td>
                <td class="border border-slate-400">Opis</td>
                <td class="border border-slate-400">Autor</td>
            </tr>
        </thead>
        @foreach ($files as $file)
            <tr>
                <td class="border border-slate-400"><a href="/files/{{ $file['id'] }}">{{ $file['name'] }}</a></td>
                <td class="border border-slate-400">{{ $file['description'] }}</td>
                <td class="border border-slate-400">{{ $file['author'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>
