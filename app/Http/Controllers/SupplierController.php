<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan semua supplier
    public function index()
    {
        $supplier = Supplier::latest()->get();

        return view('supplier.index', compact('supplier'));
    }

    // Menampilkan form tambah supplier
    public function create()
    {
        return view('supplier.create');
    }

    // Menyimpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email'
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil ditambahkan');
    }

    // Form edit supplier
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', compact('supplier'));
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email'
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil diupdate');
    }

    // Hapus supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil dihapus');
    }
}
?>