<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*\d).{8,}$/',
                'confirmed',
            ],
            'terms' => 'accepted',
            'privacy' => 'accepted',
        ], [
            'name.required' => 'Nazwa użytkownika jest wymagana.',
            'name.unique' => 'Taka nazwa użytkownika już istnieje.',
            'email.required' => 'Adres e-mail jest wymagany.',
            'email.email' => 'Podaj poprawny adres e-mail.',
            'email.unique' => 'Taki adres e-mail już istnieje.',
            'password.required' => 'Hasło jest wymagane.',
            'password.min' => 'Hasło musi mieć co najmniej 8 znaków.',
            'password.regex' => 'Hasło musi zawierać co najmniej 8 znaków, jedną cyfrę i jeden znak specjalny.',
            'password.confirmed' => 'Hasła muszą być takie same.',
            'terms.accepted' => 'Musisz zaakceptować regulamin.',
            'privacy.accepted' => 'Musisz zaakceptować politykę prywatności.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Rejestracja zakończona sukcesem!');
    }
}
