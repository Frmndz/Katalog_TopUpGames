<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\games;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //Menampilkan daftar serta filter
    public function index(Request $request)
    {
        $query = items::with('games');

        if ($request->filled('games')) {
            $query->where('game_id', $request->game_id);
        }

        $items = $query->latest()->get();
        $games = games::all();

        return view('items.index', compact('items', 'games'));
    }

    //Menambah data
    public function create()
    {
        $games = games::all();
        return view('items.create', compact('games'));
    }

    // menyimpan data serta validasi server side
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'game_id.required' => 'Game harus dipilih.',
            'game_id.exists' => 'Game yang dipilih tidak valid.',
            'name.required' => 'Nama item harus diisi.',
            'name.string' => 'Nama item harus berupa teks.',
            'name.max' => 'Nama item tidak boleh lebih dari 255 karakter.',
            'price.required' => 'Harga item harus diisi.',
            'price.numeric' => 'Harga item harus berupa angka.',
            'price.min' => 'Harga item tidak boleh kurang dari 0.',
        ]);

        items::create($validatedData);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    //Edit data
    public function edit(Request $request, items $items)
    {
        $games = games::all();
        return view('items.edit', compact('items','games'));

    }

    //Update data
    public function update(Request $request, items $items)
    {
        $validateData = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $items->update($validateData);
        return redirect()->route('items.index')->with('success', 'Item berhasil diupdate.');
    }

    //Delete data
    public function destroy(items $items)
    {
        $items->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }
}
