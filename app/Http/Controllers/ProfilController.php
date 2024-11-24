<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = Auth::user();
        return view('user.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profil = Auth::user();
        return view('user.profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'posisi.required'=>'posisi harus di isi'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->posisi = $request->posisi;

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }
            $file = $request->file('image');
            $filename = 'image-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
