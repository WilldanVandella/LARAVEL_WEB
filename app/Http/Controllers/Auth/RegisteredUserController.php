<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

  public function store(Request $request)
{
    $request->validate([
        'nim' => ['required', 'string', 'max:255', 'unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'tempat_lahir' => ['required', 'string', 'max:255'],
        'tanggal_lahir' => ['required', 'date'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $fotoProfilName = null;
    if ($request->hasFile('foto_profil')) {
        $fotoProfilName = time() . '.' . $request->foto_profil->extension();
        $request->foto_profil->storeAs('public/foto-profil', $fotoProfilName);

         \Log::info('Foto profil disimpan: ' . $fotoProfilName);
    }

    $user = User::create([
        'nim' => $request->nim,
        'name' => $request->name,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'email' => $request->email,
        'foto_profil' => $fotoProfilName,
        'password' => Hash::make($request->password),
    ]);

      \Log::info('User created with foto_profil: ' . $user->foto_profil);

    event(new Registered($user));
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
}