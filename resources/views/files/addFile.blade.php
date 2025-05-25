<x-layout
    title="Archiwum | Dodaj plik"
    description="Dodaj plik do Archiwum. Wprowadź szczegóły pliku, aby umożliwić innym użytkownikom przeglądanie i pobieranie zasobów."
    keywords="dodaj plik, archiwum, zasoby, przeglądanie, pobieranie, użytkownicy"
>
    <form action="{{ route('addFile.push') }}" method="POST" enctype="multipart/form-data" 
                                class="flex items-center justify-center w-full h-full">
        {{-- Enctype - do plików!!!! --}}
        @csrf
        <div class="flex flex-col items-center justify-center w-full max-w-lg p-6 rounded-lg bg-zinc-700">
            <h2 class="mb-6 text-3xl font-bold text-center text-white">Dodaj plik</h2>
            <div class="w-full mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-white">Nazwa pliku</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <label for="description" class="block mt-4 mb-2 text-sm font-medium text-white">Opis</label>
                <textarea id="description" name="description" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                <label for="file" class="block mt-4 mb-2 text-sm font-medium text-white">Wybierz plik</label>
                <input type="file" id="file" name="file" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                {{-- SKRYPT DO ROZMIARU PLIKU --}}
                <script> 
                document.getElementById('file').addEventListener('change', function(e) {
                    const max = 100 * 1024 * 1024 * 2; // 200MB
                    if (this.files[0] && this.files[0].size > max) {
                        alert('Plik jest za duży (limit 100MB).');
                        this.value = '';
                    }
                });
                </script>

                <button type="submit" class="w-full px-4 py-2 mt-6 text-white transition-transform duration-200 bg-green-600 rounded-lg cursor-pointer hover:scale-101 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Dodaj plik</button>
            </div>
            @if($errors->any())
                <div class="mb-4 text-red-500">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        </div>
</x-layout>