<x-layout 
    title="Archiwum | Strona główna"
    description="Witamy w Archiwum. Znajdziesz tutaj różnorodne pliki i zasoby do pobrania. Przeglądaj, pobieraj i korzystaj z naszych zasobów."
    keywords="archiwum, pliki, zasoby, pobieranie, przeglądanie, korzystanie"
>

    <table class="w-full text-xl border border-collapse border-slate-500">
        <thead class="bg-slate-600">
            <tr>
                <td class="border border-slate-400 indent-1">Nazwa pliku</td>
                <td class="border border-slate-400 indent-1">Opis</td>
                <td class="border border-slate-400 indent-1">Autor</td>
            </tr>
        </thead>
        @foreach ($files as $file)
            <tr>
                <td class="border indent-1 border-slate-400"><a href="/files/{{ $file->id }}">{{ $file->name }}</a></td>
                <td class="border indent-1 border-slate-400">{{ $file->description }}</td>
                <td class="border indent-1 border-slate-400">{{ $file->user ? $file->user->name : 'Brak autora' }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>
