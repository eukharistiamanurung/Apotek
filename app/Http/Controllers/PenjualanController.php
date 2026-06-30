<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Menampilkan data penjualan
     */
    public function index()
    {
        $penjualan = Penjualan::latest()->get();

        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Form tambah penjualan
     */
    public function create()
    {
        $obat = Obat::all();

        return view('penjualan.create', compact('obat'));
    }

    /**
     * Simpan transaksi
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:penjualans,kode_transaksi',
            'tanggal' => 'required|date',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {

            $obat = Obat::findOrFail($request->obat_id);

            if ($obat->stok < $request->jumlah) {

                return back()
                    ->withInput()
                    ->with('error', 'Stok obat tidak mencukupi.');
            }

            $subtotal = $obat->harga_jual * $request->jumlah;

            $penjualan = Penjualan::create([
                'user_id' => Auth::id(),
                'kode_transaksi' => $request->kode_transaksi,
                'tanggal' => $request->tanggal,
                'total_harga' => $subtotal,
            ]);

            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'obat_id' => $obat->id,
                'jumlah' => $request->jumlah,
                'harga' => $obat->harga_jual,
                'subtotal' => $subtotal,
            ]);

            $obat->decrement('stok', $request->jumlah);

            DB::commit();

            return redirect()
                ->route('penjualan.index')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('penjualan.edit', compact('penjualan'));
    }

    /**
     * Update transaksi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
        ]);

        $penjualan = Penjualan::findOrFail($id);

        $penjualan->update([
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal' => $request->tanggal,
            'total_harga' => $request->total_harga,
        ]);

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diperbarui.');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->delete();

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus.');
    }
}