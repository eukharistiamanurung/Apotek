<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use App\Models\Kategori;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $totalSupplier = Supplier::count();
        $totalKategori = Kategori::count();
        $totalPenjualan = Penjualan::count();

        $totalPendapatan = Penjualan::sum('total_harga');

        return view('dashboard', compact(
            'totalObat',
            'totalSupplier',
            'totalKategori',
            'totalPenjualan',
            'totalPendapatan'
        ));
    }
}