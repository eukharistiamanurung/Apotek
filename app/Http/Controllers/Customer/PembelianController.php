<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Obat;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class PembelianController extends Controller
{
    /**
     * Menampilkan katalog obat
     */
    public function katalog(Request $request)
    {
        $search = $request->search;
        $kategori = $request->kategori;

        $obat = Obat::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_obat', 'like', "%{$search}%")
                      ->orWhere('kode_obat', 'like', "%{$search}%");
                });
            })
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('kategori_id', $kategori);
            })
            ->latest()
            ->get();

        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('katalog.index', compact(
            'obat',
            'kategoris',
            'search',
            'kategori'
        ));
    }

    /**
     * Detail obat
     */
    public function detail(Obat $obat)
    {
        return view('customer.detail', compact('obat'));
    }

    /**
     * Form pembelian langsung
     */
    public function create(Obat $obat)
    {
        return view('customer.beli', compact('obat'));
    }

    /**
     * Simpan pembelian
     */
    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah'  => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        if ($request->jumlah > $obat->stok) {
            return back()->with('error', 'Stok obat tidak mencukupi.');
        }

        DB::beginTransaction();

        try {

            $subtotal = $obat->harga_jual * $request->jumlah;

            $penjualan = Penjualan::create([
                'user_id'         => Auth::id(),
                'kode_transaksi'  => 'TRX' . now()->format('YmdHis'),
                'tanggal'         => now(),
                'total_harga'     => $subtotal,
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
                ->route('customer.riwayat')
                ->with('success', 'Pembelian berhasil.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Riwayat pembelian
     */
    public function riwayat()
    {
        $penjualan = Penjualan::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('customer.riwayat', compact('penjualan'));
    }
}