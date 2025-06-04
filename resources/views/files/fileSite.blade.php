<x-layout 
    title="Archiwum | Plik"
    description="Szczegóły pliku w Archiwum. Pobierz lub przeglądaj plik, aby uzyskać więcej informacji. Skorzystaj z naszych zasobów."
    keywords="plik, szczegóły, archiwum, pobieranie, przeglądanie, zasoby"
>
        @php
            $file = \App\Models\File::with('user')->find($id);
            $comments = \App\Models\Comment::where('file_id', $id)->with('user')->orderByDesc('created_at')->get();
        @endphp
        @if($file)
            <table class="w-full mb-6 text-xl border border-collapse table-fixed border-slate-500">
                <colgroup>
                    <col style="width: 30%">
                    <col style="width: 70%">
                </colgroup>
                <tr>
                    <td class="p-2 font-bold border border-slate-400 indent-1">Nazwa pliku</td>
                    <td class="p-2 border border-slate-400 indent-1">{{ $file->name }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-bold border border-slate-400 indent-1">Opis</td>
                    <td class="p-2 border border-slate-400 indent-1">{{ $file->description }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-bold border border-slate-400 indent-1">Autor</td>
                    <td class="p-2 border border-slate-400 indent-1">{{ $file->user ? $file->user->name : 'Brak autora' }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-bold border border-slate-400 indent-1">Rozszerzenie</td>
                    <td class="p-2 border border-slate-400 indent-1">{{ $file->extension }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-bold border border-slate-400 indent-1">Pobierz</td>
                    <td class="p-2 border border-slate-400 indent-1">
                        <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="p-1 text-white transition bg-green-600 rounded hover:bg-green-700" download="{{ $file->name }}.{{ $file->extension }}">Pobierz plik</a>
                    </td>
                </tr>
            </table>
            <div class="w-full mb-6 rounded-lg bg-zinc-700">
                <h2 class="pl-4 mt-8 mb-2 text-2xl font-bold text-white">Komentarze</h2>
                <div class="mb-6">
                    @foreach($comments as $comment)
                        <div class="p-4 mb-4 border rounded-lg bg-zinc-800 border-slate-600">
                            <div class="text-lg font-bold text-green-400">{{ $comment->user ? $comment->user->name : 'Anonim? (Coś poszło nie tak, tu nie ma być nulla.)' }}</div>
                            <div class="font-semibold text-white">{{ $comment->title }}</div>
                            <div class="text-gray-200">{{ $comment->content }}</div>
                            <div class="mt-2 text-xs text-gray-400">{{ $comment->created_at }}</div>
                        </div>
                    @endforeach
                    @if($comments->isEmpty())
                        <div class="pl-4 text-gray-400">Brak komentarzy.</div>
                    @endif
                </div>
                @auth
                <form action="{{ route('comment.push', $file->id) }}" method="POST" class="p-4 mb-8 rounded-lg bg-zinc-700">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="block mb-1 text-white">Tytuł (opcjonalnie):</label>
                        <input type="text" id="title" name="title" maxlength="255" class="w-full px-3 py-2 text-white border rounded border-slate-400">
                    </div>
                    <div class="mb-2">
                        <label for="content" class="block mb-1 text-white">Treść komentarza:</label>
                        <textarea id="content" name="content" required class="w-full px-3 py-2 text-white border rounded border-slate-400"></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700 hover:cursor-pointer">Dodaj komentarz</button>
                </form>
                @else
                    <div class="mb-8 text-gray-400">Zaloguj się, aby dodać komentarz.</div>
                @endauth
            </div>
            
        @else
            <div class="text-xl text-red-500">Nie znaleziono pliku.</div>
        @endif
</x-layout>