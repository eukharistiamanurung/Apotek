<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Menampilkan seluruh data supplier
     */
    public function index()
    {
        $supplier = Supplier::latest()->paginate(10);

        return view('supplier.index', compact('supplier'));
    }

    /**
     * Menampilkan form tambah supplier
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Menyimpan supplier baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:100',
            'alamat'        => 'required|string|max:255',
            'telepon'       => 'required|string|max:20',
            'email'         => 'nullable|email|max:100|unique:suppliers,email',
        ]);

        Supplier::create([
            'nama_supplier' => trim($validated['nama_supplier']),
            'alamat'        => trim($validated['alamat']),
            'telepon'       => trim($validated['telepon']),
            'email'         => $validated['email'] ?? null,
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit supplier
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Mengupdate supplier
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:100',
            'alamat'        => 'required|string|max:255',
            'telepon'       => 'required|string|max:20',
            'email'         => 'nullable|email|max:100|unique:suppliers,email,' . $supplier->id,
        ]);

        $supplier->update([
            'nama_supplier' => trim($validated['nama_supplier']),
            'alamat'        => trim($validated['alamat']),
            'telepon'       => trim($validated['telepon']),
            'email'         => $validated['email'] ?? null,
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil diperbarui.');
    }

    /**
     * Menghapus supplier
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil dihapus.');
    }
}