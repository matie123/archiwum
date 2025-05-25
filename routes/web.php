<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\File;
use Illuminate\Http\Request;

Route::get('/', function () {
    $files = File::all();
    return view('welcome' ,["files" => $files]);
});

Route::get('/login', function(){
    return view('accountManagement.login');
});

Route::get('/register', function(){
    return view('accountManagement.register');
});

Route::get('/files/{id}', function ($id) {
    return view('files.fileSite' ,["id" => $id]);
});

Route::get('/addFile', function () {
    return view('files.addFile');
});

Route::get('/regulations', function () {
    return view('bureaucracy.regulations');
});
Route::get('/privacy', function () {
    return view('bureaucracy.privacy');
});

Route::post('/register/push', 
[RegisterController::class, 'register'])->name('register.push');

Route::post('/login/push', [LoginController::class, 'login'])->name('login.push');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('addFile/push', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'required|file|max:204800', // max 200MB (204800 KB)
    ],
    [
        'name.required' => 'Nazwa pliku jest wymagana.',
        'name.max' => 'Nazwa pliku nie może przekraczać 255 znaków.',
        'description.string' => 'Opis musi być tekstem.',
        'file.required' => 'Plik jest wymagany.',
        'file.file' => 'Musisz przesłać plik.',
        'file.max' => 'Plik nie może przekraczać 200MB.',
    ]);

    if (!Auth::check()) {
        return redirect('/addFile')->withErrors(['auth' => 'Musisz być zalogowany, aby dodać plik.']);
    }

    if (File::where('name', $validated['name'])->exists()) {
        return redirect('/addFile')->withErrors(['name' => 'Plik o tej nazwie już istnieje.']);
    }

    $path = $request->file('file')->store('files', 'public');
    if (!$path) {
        return redirect('/addFile')->withErrors(['file' => 'Nie udało się przesłać pliku.']);
    }

    File::create([
        'name' => $validated['name'],
        'description' => $validated['description'] ?? null,
        'path' => $path,
        'user_id' => Auth::id(),
        'extension' => $request->file('file')->getClientOriginalExtension(),
    ]);

    return redirect('/')->with('success', 'Plik został dodany!');
})->name('addFile.push');