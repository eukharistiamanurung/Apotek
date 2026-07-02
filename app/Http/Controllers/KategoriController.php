<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan seluruh data kategori
     */
    public function index()
    {
        $kategori = Kategori::latest()->paginate(10);

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Menampilkan form tambah kategori
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Menyimpan data kategori
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategoris,nama_kategori',
            'deskripsi'     => 'nullable|string|max:1000',
        ]);

        Kategori::create([
            'nama_kategori' => trim($validated['nama_kategori']),
            'deskripsi'     => $validated['deskripsi'] ?? null,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Mengupdate data kategori
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategoris,nama_kategori,' . $kategori->id,
            'deskripsi'     => 'nullable|string|max:1000',
        ]);

        $kategori->update([
            'nama_kategori' => trim($validated['nama_kategori']),
            'deskripsi'     => $validated['deskripsi'] ?? null,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}