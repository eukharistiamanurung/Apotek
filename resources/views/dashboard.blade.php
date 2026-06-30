@extends('layouts.admin')

@section('content')

<style>

    .card-box{
        border-radius:20px;
        padding:25px;
        color:white;
        box-shadow:0 10px 25px rgba(0,0,0,.15);
    }

    .obat{
        background:linear-gradient(135deg,#3b82f6,#2563eb);
    }

    .supplier{
        background:linear-gradient(135deg,#10b981,#059669);
    }

    .kategori{
        background:linear-gradient(135deg,#f59e0b,#d97706);
    }

    .penjualan{
        background:linear-gradient(135deg,#8b5cf6,#7c3aed);
    }

    .pendapatan{
        background:linear-gradient(135deg,#ef4444,#dc2626);
    }

    .jumlah{
        font-size:38px;
        font-weight:bold;
    }

</style>

<h2 class="mb-4">
    📊 Dashboard Sistem Apotek
</h2>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card-box obat">
            <h5>Total Obat</h5>
            <div class="jumlah">
                {{ $totalObat }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box supplier">
            <h5>Total Supplier</h5>
            <div class="jumlah">
                {{ $totalSupplier }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box kategori">
            <h5>Total Kategori</h5>
            <div class="jumlah">
                {{ $totalKategori }}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box penjualan">
            <h5>Total Transaksi</h5>
            <div class="jumlah">
                {{ $totalPenjualan }}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box pendapatan">
            <h5>Total Pendapatan</h5>
            <div class="jumlah">
                Rp {{ number_format($totalPendapatan,0,',','.') }}
            </div>
        </div>
    </div>

</div>

@endsection