@extends('layouts.customer')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            🛒 Keranjang Belanja
        </h2>

        <p class="text-muted">
            Daftar obat yang akan dibeli.
        </p>
    </div>

    <a href="{{ route('katalog.index') }}" class="btn btn-secondary">
        ← Kembali ke Katalog
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

@if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif

@if(count($cart) > 0)

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered align-middle">

            <thead class="table-primary">

                <tr>

                    <th>Gambar</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th width="180">Jumlah</th>
                    <th>Subtotal</th>
                    <th width="100">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @php

                $total = 0;

            @endphp

            @foreach($cart as $item)

            @php

                $subtotal = $item['harga'] * $item['jumlah'];

                $total += $subtotal;

            @endphp

            <tr>

                <td width="100">

                    @if($item['gambar'])

                        <img
                            src="{{ asset('storage/'.$item['gambar']) }}"
                            width="80"
                            height="80"
                            style="object-fit:cover;border-radius:10px;">

                    @else

                        -

                    @endif

                </td>

                <td>

                    <strong>

                        {{ $item['nama_obat'] }}

                    </strong>

                </td>

                <td>

                    Rp {{ number_format($item['harga'],0,',','.') }}

                </td>

                <td>

                    <form
                        action="{{ route('customer.cart.update',$item['id']) }}"
                        method="POST">

                        @csrf

                        <input
                            type="number"
                            name="jumlah"
                            value="{{ $item['jumlah'] }}"
                            min="1"
                            max="{{ $item['stok'] }}"
                            class="form-control mb-2">

                        <button
                            class="btn btn-warning btn-sm w-100">

                            Update

                        </button>

                    </form>

                </td>

                <td>

                    Rp {{ number_format($subtotal,0,',','.') }}

                </td>

                <td>

                    <form
                        action="{{ route('customer.cart.remove',$item['id']) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="text-end">

            <h3>

                Total :
                <span class="text-success">

                    Rp {{ number_format($total,0,',','.') }}

                </span>

            </h3>

            <form
                action="{{ route('customer.checkout') }}"
                method="POST">

                @csrf

                <button
                    class="btn btn-success btn-lg">

                    ✅ Checkout

                </button>

            </form>

        </div>

    </div>

</div>

@else

<div class="alert alert-warning">

    Keranjang masih kosong.

</div>

@endif

@endsection