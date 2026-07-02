<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    /**
     * Menampilkan daftar transaksi
     */
    public function index()
    {
        $penjualan = Penjualan::with('user')
            ->latest()
            ->paginate(10);

        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Form tambah transaksi
     */
    public function create()
    {
        $obat = Obat::where('stok', '>', 0)
            ->orderBy('nama_obat')
            ->get();

        return view('penjualan.create', compact('obat'));
    }

    /**
     * Simpan transaksi
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:penjualans,kode_transaksi',
            'tanggal'        => 'required|date',
            'obat_id'        => 'required|exists:obats,id',
            'jumlah'         => 'required|integer|min:1',
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
                'user_id'        => Auth::id(),
                'kode_transaksi' => $request->kode_transaksi,
                'tanggal'        => $request->tanggal,
                'total_harga'    => $subtotal,
            ]);

            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'obat_id'      => $obat->id,
                'jumlah'       => $request->jumlah,
                'harga'        => $obat->harga_jual,
                'subtotal'     => $subtotal,
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
     * Detail transaksi
     */
    public function show($id)
    {
        $penjualan = Penjualan::with([
            'user',
            'detailPenjualans.obat'
        ])->findOrFail($id);

        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Cetak Invoice PDF
     */
    public function invoice($id)
    {
        $penjualan = Penjualan::with([
            'user',
            'detailPenjualans.obat'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('penjualan.invoice', compact('penjualan'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream(
            'Invoice-' . $penjualan->kode_transaksi . '.pdf'
        );

        // Jika ingin langsung download:
        // return $pdf->download('Invoice-'.$penjualan->kode_transaksi.'.pdf');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $penjualan = Penjualan::with('detailPenjualans')
                ->findOrFail($id);

            foreach ($penjualan->detailPenjualans as $detail) {

                $obat = Obat::find($detail->obat_id);

                if ($obat) {
                    $obat->increment('stok', $detail->jumlah);
                }

                $detail->delete();
            }

            $penjualan->delete();

            DB::commit();

            return redirect()
                ->route('penjualan.index')
                ->with('success', 'Transaksi berhasil dihapus.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with('error', $e->getMessage());

        }
    }
}