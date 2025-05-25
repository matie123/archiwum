<x-layout 
    title="Archiwum | Rejestracja"
    description="Zarejestruj się w Archiwum, aby uzyskać dostęp do wszystkich funkcji serwisu. Wprowadź swoje dane rejestracyjne, aby kontynuować."
    keywords="rejestracja, konto, archiwum, dostęp, funkcje, serwis"
>
        <form action="{{ route('register.push') }}" method="POST" class="flex items-center justify-center w-full h-full">
            @csrf
            <div class="flex flex-col items-center justify-center w-full max-w-lg p-6 rounded-lg bg-zinc-700">
                <h2 class="mb-6 text-3xl font-bold text-center text-white">Rejestracja</h2>
                <div class="w-full mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Nazwa użytkownika</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <label for="email" class="block mt-4 mb-2 text-sm font-medium text-white">Adres e-mail</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <label for="password" class="block mt-4 mb-2 text-sm font-medium text-white">Hasło</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <label for="password_confirmation" class="block mt-4 mb-2 text-sm font-medium text-white">Potwierdź hasło</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 text-gray-900 transition-transform duration-200 bg-white border border-gray-300 rounded-lg hover:scale-101 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <div class="flex items-center mt-4">
                        <input type="checkbox" id="terms" name="terms" required class="mr-2 cursor-pointer">
                        <label for="terms" class="text-sm text-white">
                            Akceptuję <a href="/regulations" class="text-blue-400 underline hover:text-blue-600" target="_blank">regulamin</a>
                        </label>
                    </div>
                    <div class="flex items-center mt-2">
                        <input type="checkbox" id="privacy" name="privacy" required class="mr-2 cursor-pointer">
                        <label for="privacy" class="text-sm text-white">
                            Akceptuję <a href="/privacy" class="text-blue-400 underline hover:text-blue-600" target="_blank">politykę prywatności</a>
                        </label>
                    </div>

                    <button type="submit" class="w-full px-4 py-2 mt-6 text-white transition-transform duration-200 bg-green-600 rounded-lg cursor-pointer hover:scale-101 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Zarejestruj się</button>
                </div>
                @if($errors->any())
                    <div class="mb-4 text-red-500">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <p class="mt-4 text-sm text-white">
                    Masz już konto? <a href="/login" class="text-blue-400 underline hover:text-blue-600">Zaloguj się</a>
            </div>
        </form>
</x-layout>