@extends('layouts.customer')

@section('title', 'Beli Obat')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h3>🛒 Pembelian Obat</h3>

            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>
                @endif

                <form action="{{ route('customer.store') }}" method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="obat_id"
                        value="{{ $obat->id }}"
                    >

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Obat

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $obat->nama_obat }}"
                            readonly
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Harga

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="Rp {{ number_format($obat->harga_jual,0,',','.') }}"
                            readonly
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Stok

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $obat->stok }}"
                            readonly
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Jumlah Beli

                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            class="form-control"
                            min="1"
                            max="{{ $obat->stok }}"
                            required
                        >

                    </div>

                    <div class="d-flex justify-content-between">

                        <a
                            href="{{ route('katalog.index') }}"
                            class="btn btn-secondary"
                        >
                            ← Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            🛒 Beli Sekarang
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection