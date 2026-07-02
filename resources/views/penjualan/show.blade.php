@extends('layouts.admin')

@section('content')

<style>

.page-title{
    font-weight:700;
    color:#1E293B;
}

.page-subtitle{
    color:#64748B;
}

.card-custom{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.card-header-custom{
    background:linear-gradient(135deg,#2563EB,#3B82F6);
    color:white;
    border-radius:20px 20px 0 0;
    padding:20px;
}

.table thead{
    background:#2563EB;
    color:white;
}

.table thead th{
    border:none;
}

.total-box{
    background:#F8FAFC;
    border-radius:15px;
    padding:20px;
}

.total-harga{
    font-size:30px;
    font-weight:bold;
    color:#16A34A;
}

</style>

<div class="mb-4">

    <h2 class="page-title">

        🧾 Detail Transaksi

    </h2>

    <p class="page-subtitle">

        Detail lengkap transaksi penjualan.

    </p>

</div>

<div class="card card-custom mb-4">

    <div class="card-header-custom">

        <h4 class="mb-0">

            Informasi Transaksi

        </h4>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Kode Transaksi</strong>

                <br>

                {{ $penjualan->kode_transaksi }}

            </div>

            <div class="col-md-6 mb-3">

                <strong>Tanggal</strong>

                <br>

                {{ \Carbon\Carbon::parse($penjualan->tanggal)->format('d-m-Y H:i') }}

            </div>

            <div class="col-md-6">

                <strong>Customer</strong>

                <br>

                {{ $penjualan->user->name ?? '-' }}

            </div>

        </div>

    </div>

</div>

<div class="card card-custom">

    <div class="card-header-custom">

        <h4 class="mb-0">

            Daftar Obat

        </h4>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered align-middle">

                <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>

                </tr>

                </thead>

                <tbody>

                @foreach($penjualan->detailPenjualans as $detail)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        {{ $detail->obat->nama_obat }}

                    </td>

                    <td>

                        Rp {{ number_format($detail->harga,0,',','.') }}

                    </td>

                    <td>

                        {{ $detail->jumlah }}

                    </td>

                    <td>

                        Rp {{ number_format($detail->subtotal,0,',','.') }}

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        <div class="total-box mt-4">

            <h5>Total Pembayaran</h5>

            <div class="total-harga">

                Rp {{ number_format($penjualan->total_harga,0,',','.') }}

            </div>

        </div>

        <div class="mt-4">

            <a
                href="{{ route('penjualan.index') }}"
                class="btn btn-secondary">

                ← Kembali

            </a>

            <a
                href="#"
                class="btn btn-primary">

                🖨 Cetak Invoice

            </a>

        </div>

    </div>

</div>

@endsection