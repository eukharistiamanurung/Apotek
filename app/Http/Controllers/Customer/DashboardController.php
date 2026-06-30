<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPembelian = Penjualan::where('user_id', Auth::id())->count();

        $totalPengeluaran = Penjualan::where('user_id', Auth::id())
            ->sum('total_harga');

        $transaksiTerakhir = Penjualan::where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('customer.dashboard', compact(
            'totalPembelian',
            'totalPengeluaran',
            'transaksiTerakhir'
        ));
    }
}