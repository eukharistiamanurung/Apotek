@extends('layouts.customer')

@section('title', 'Riwayat Pembelian')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            📋 Riwayat Pembelian
        </h2>

        <p class="text-muted mb-0">
            Berikut adalah daftar pembelian yang telah Anda lakukan.
        </p>

    </div>

    <a href="{{ route('katalog.index') }}"
       class="btn btn-primary">
        💊 Kembali ke Katalog
    </a>

</div>

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<div class="card shadow border-0">

    <div class="card-body">

        @if($penjualan->count())

        <div class="table-responsive">

            <table class="table table-striped align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>Kode Transaksi</th>

                        <th>Tanggal</th>

                        <th>Total Harga</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($penjualan as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->kode_transaksi }}</td>

                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>

                        <td class="fw-bold text-success">

                            Rp {{ number_format($item->total_harga,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="text-center py-5">

            <h4 class="text-secondary">

                Belum ada riwayat pembelian.

            </h4>

            <a href="{{ route('katalog.index') }}"
               class="btn btn-primary mt-3">

                Belanja Sekarang

            </a>

        </div>

        @endif

    </div>

</div>

@endsection