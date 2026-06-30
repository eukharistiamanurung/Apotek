@extends('layouts.admin')

@section('content')

<style>

    .card-custom{
        background:white;
        border:none;
        border-radius:20px;
        box-shadow:0 5px 20px rgba(0,0,0,.08);
    }

    .header-custom{
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        color:white;
        border-radius:20px 20px 0 0;
        padding:25px;
    }

    .card-body{
        padding:30px;
    }

    .form-control,
    .form-select{
        border-radius:10px;
    }

    .btn-save{
        background:#2563eb;
        color:white;
        border:none;
        padding:10px 20px;
        border-radius:10px;
    }

    .btn-save:hover{
        background:#1d4ed8;
        color:white;
    }

    .btn-back{
        background:#6b7280;
        color:white;
        text-decoration:none;
        padding:10px 20px;
        border-radius:10px;
    }

    .btn-back:hover{
        background:#4b5563;
        color:white;
    }

</style>

<div class="card card-custom">

    <div class="header-custom">

        <h3>🛒 Tambah Penjualan</h3>

        <p class="mb-0">
            Tambahkan transaksi penjualan baru.
        </p>

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

        <form action="{{ route('penjualan.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kode Transaksi
                    </label>

                    <input
                        type="text"
                        name="kode_transaksi"
                        class="form-control"
                        value="{{ old('kode_transaksi') }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal') }}"
                        required>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label">
                        Pilih Obat
                    </label>

                    <select
                        name="obat_id"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Obat --
                        </option>

                        @foreach($obat as $item)

                        <option value="{{ $item->id }}">

                            {{ $item->nama_obat }}
                            | Stok : {{ $item->stok }}
                            | Rp {{ number_format($item->harga_jual,0,',','.') }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Jumlah Beli
                    </label>

                    <input
                        type="number"
                        name="jumlah"
                        class="form-control"
                        min="1"
                        value="{{ old('jumlah') }}"
                        required>

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('penjualan.index') }}" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-save">
                    💾 Simpan Transaksi
                </button>

            </div>

        </form>

    </div>

</div>

@endsection