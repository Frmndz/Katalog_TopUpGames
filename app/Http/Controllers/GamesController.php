<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\games;

class GamesController extends Controller
{
    //Menambah Data
    public function create()
    {
        return view('games.create');
    }

    //Validasi Data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama game harus diisi.',
            'name.string' => 'Nama game harus berupa teks.',
            'name.max' => 'Nama game tidak boleh lebih dari 255 karakter.',
            'publisher.required' => 'Publisher game harus diisi.',
            'publisher.string' => 'Publisher game harus berupa teks.',
            'publisher.max' => 'Publisher game tidak boleh lebih dari 255 karakter.',
        ]);

        games::create($validatedData);

        return redirect()->route('games.create')->with('success', 'Game berhasil ditambahkan.');
    }

}
