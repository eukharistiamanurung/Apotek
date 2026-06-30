<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Menampilkan seluruh data obat
     */
    public function index()
    {
        $obat = Obat::with('kategori')->latest()->get();

        return view('obat.index', compact('obat'));
    }

    /**
     * Form tambah obat
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('obat.create', compact('kategori'));
    }

    /**
     * Simpan obat
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_obat'   => 'required|unique:obats,kode_obat',
            'nama_obat'   => 'required',
            'deskripsi'   => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('obat', 'public');
        }

        Obat::create([
            'kategori_id' => $request->kategori_id,
            'kode_obat'   => $request->kode_obat,
            'nama_obat'   => $request->nama_obat,
            'deskripsi'   => $request->deskripsi,
            'stok'        => $request->stok,
            'harga_jual'  => $request->harga_jual,
            'gambar'      => $gambar,
        ]);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan.');
    }

    /**
     * Form edit obat
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $kategori = Kategori::all();

        return view('obat.edit', compact('obat', 'kategori'));
    }

    /**
     * Update obat
     */
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_obat'   => 'required|unique:obats,kode_obat,' . $id,
            'nama_obat'   => 'required',
            'deskripsi'   => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = $obat->gambar;

        if ($request->hasFile('gambar')) {

            if ($obat->gambar && Storage::disk('public')->exists($obat->gambar)) {
                Storage::disk('public')->delete($obat->gambar);
            }

            $gambar = $request->file('gambar')->store('obat', 'public');
        }

        $obat->update([
            'kategori_id' => $request->kategori_id,
            'kode_obat'   => $request->kode_obat,
            'nama_obat'   => $request->nama_obat,
            'deskripsi'   => $request->deskripsi,
            'stok'        => $request->stok,
            'harga_jual'  => $request->harga_jual,
            'gambar'      => $gambar,
        ]);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui.');
    }

    /**
     * Hapus obat
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        if ($obat->gambar && Storage::disk('public')->exists($obat->gambar)) {
            Storage::disk('public')->delete($obat->gambar);
        }

        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus.');
    }
}