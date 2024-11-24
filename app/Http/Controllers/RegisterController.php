<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'email.unique' => 'Email sudah digunakan, silakan coba email lain',
            'password.confirmed'=>'Password tidak cocok',
            'password.min'=>'password minimal 8 karakter'
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        auth()->login($user);
        return redirect()->route('produk.index');
    }
}
