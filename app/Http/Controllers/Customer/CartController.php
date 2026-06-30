<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Menampilkan keranjang
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('customer.cart', compact('cart'));
    }

    // Tambah ke keranjang
    public function add($id)
    {
        $obat = Obat::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['jumlah'] < $obat->stok) {
                $cart[$id]['jumlah']++;
            }

        } else {

            $cart[$id] = [
                'id' => $obat->id,
                'nama_obat' => $obat->nama_obat,
                'harga' => $obat->harga_jual,
                'stok' => $obat->stok,
                'gambar' => $obat->gambar,
                'jumlah' => 1,
            ];

        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Obat berhasil ditambahkan ke keranjang.');
    }

    // Update jumlah
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $jumlah = (int) $request->jumlah;

            if ($jumlah >= 1 && $jumlah <= $cart[$id]['stok']) {
                $cart[$id]['jumlah'] = $jumlah;
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('customer.cart');
    }

    // Hapus item
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('customer.cart')
            ->with('success', 'Item berhasil dihapus.');
    }

    // Checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang masih kosong.');
        }

        DB::beginTransaction();

        try {

            $total = 0;

            foreach ($cart as $item) {
                $total += $item['harga'] * $item['jumlah'];
            }

           $penjualan = Penjualan::create([
    'user_id' => auth()->id(),

    'kode_transaksi' => 'TRX'.date('YmdHis'),

    'tanggal' => now(),

    'total_harga' => $total,
]);

            foreach ($cart as $item) {

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'obat_id' => $item['id'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                    'subtotal' => $item['harga'] * $item['jumlah'],
                ]);

                $obat = Obat::find($item['id']);

                $obat->stok -= $item['jumlah'];
                $obat->save();
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('customer.riwayat')
                ->with('success', 'Checkout berhasil.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}