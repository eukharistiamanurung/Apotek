<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ==========================
        // Statistik Dashboard
        // ==========================
        $totalObat = Obat::count();
        $totalSupplier = Supplier::count();
        $totalKategori = Kategori::count();

        // Jika memakai role
        $totalCustomer = User::where('role', 'customer')->count();

        // Jika belum memakai role gunakan:
        // $totalCustomer = User::count();

        $totalPenjualan = Penjualan::count();
        $totalPendapatan = Penjualan::sum('total_harga');

        // ==========================
        // Grafik Penjualan 7 Hari
        // ==========================
        $grafik = Penjualan::select(
                DB::raw('DATE(tanggal) as tanggal'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderByDesc('tanggal')
            ->limit(7)
            ->get()
            ->sortBy('tanggal')
            ->values();

        $labelGrafik = $grafik->pluck('tanggal');
        $dataGrafik = $grafik->pluck('total');

        // ==========================
        // Obat Terlaris
        // ==========================
        $obatTerlaris = Obat::select(
                'obats.nama_obat',
                DB::raw('SUM(detail_penjualans.jumlah) as total_terjual')
            )
            ->join('detail_penjualans', 'obats.id', '=', 'detail_penjualans.obat_id')
            ->groupBy('obats.id', 'obats.nama_obat')
            ->orderByDesc('total_terjual')
            ->limit(5)
            ->get();

        // ==========================
        // Stok Hampir Habis
        // ==========================
        $stokMenipis = Obat::where('stok', '<=', 10)
            ->orderBy('stok')
            ->limit(5)
            ->get();

        // ==========================
        // Aktivitas Terbaru
        // ==========================
        $transaksiTerbaru = Penjualan::latest('tanggal')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalObat',
            'totalSupplier',
            'totalKategori',
            'totalCustomer',
            'totalPenjualan',
            'totalPendapatan',
            'labelGrafik',
            'dataGrafik',
            'obatTerlaris',
            'stokMenipis',
            'transaksiTerbaru'
        ));
    }
}