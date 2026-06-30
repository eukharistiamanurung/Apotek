@extends('layouts.customer')

@section('title', 'Katalog Obat')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">💊 Katalog Obat</h2>

        <p class="text-muted mb-0">
            Selamat datang,
            <strong>{{ auth()->user()->name }}</strong>
        </p>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <form action="{{ route('katalog.index') }}" method="GET">

            <div class="row g-3">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="🔍 Cari nama atau kode obat..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-4">

                    <select
                        name="kategori"
                        class="form-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($kategoris as $kat)

                            <option
                                value="{{ $kat->id }}"
                                {{ request('kategori') == $kat->id ? 'selected' : '' }}>

                                {{ $kat->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3 d-grid">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        🔍 Cari / Filter

                    </button>

                </div>

            </div>

            @if(request('search') || request('kategori'))

            <div class="mt-3">

                <a
                    href="{{ route('katalog.index') }}"
                    class="btn btn-secondary">

                    Reset Filter

                </a>

            </div>

            @endif

        </form>

    </div>

</div>

<div class="row">

@forelse($obat as $item)

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card shadow h-100 border-0">

        @if($item->gambar)

            <img
                src="{{ asset('storage/'.$item->gambar) }}"
                class="card-img-top"
                style="height:220px;object-fit:cover;">

        @else

            <img
                src="https://via.placeholder.com/500x220?text=Tidak+Ada+Gambar"
                class="card-img-top"
                style="height:220px;object-fit:cover;">

        @endif

        <div class="card-body">

            <h4 class="fw-bold">

                {{ $item->nama_obat }}

            </h4>

            @if($item->kategori)

                <span class="badge bg-primary mb-2">

                    {{ $item->kategori->nama_kategori }}

                </span>

            @endif

            <hr>

            <p>

                <strong>Kode :</strong>

                {{ $item->kode_obat }}

            </p>

            <p>

                <strong>Deskripsi :</strong>

                {{ Str::limit($item->deskripsi,80) }}

            </p>

            <p>

                <strong>Stok :</strong>

                @if($item->stok > 10)

                    <span class="badge bg-success">

                        {{ $item->stok }}

                    </span>

                @elseif($item->stok > 0)

                    <span class="badge bg-warning text-dark">

                        Tinggal {{ $item->stok }}

                    </span>

                @else

                    <span class="badge bg-danger">

                        Habis

                    </span>

                @endif

            </p>

            <h5 class="text-success fw-bold">

                Rp {{ number_format($item->harga_jual,0,',','.') }}

            </h5>

        </div>

        <div class="card-footer bg-white border-0">

            @if($item->stok > 0)

                <div class="d-grid gap-2">

                    <a
                        href="{{ route('customer.detail',$item->id) }}"
                        class="btn btn-outline-success">

                        👁 Lihat Detail

                    </a>

                    <form
                        action="{{ route('customer.cart.add',$item->id) }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-primary">

                            🛒 Tambah ke Keranjang

                        </button>

                    </form>

                </div>

            @else

                <button
                    class="btn btn-secondary w-100"
                    disabled>

                    Stok Habis

                </button>

            @endif

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning text-center">

        <h5>

            😥 Obat tidak ditemukan.

        </h5>

    </div>

</div>

@endforelse

</div>

@endsection