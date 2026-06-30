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

    .form-control{
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

        <h3>🛒 Edit Penjualan</h3>

        <p class="mb-0">
            Perbarui data transaksi penjualan.
        </p>

    </div>

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('penjualan.update',$penjualan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kode Transaksi
                    </label>

                    <input
                        type="text"
                        name="kode_transaksi"
                        class="form-control"
                        value="{{ old('kode_transaksi',$penjualan->kode_transaksi) }}"
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
                        value="{{ old('tanggal',$penjualan->tanggal) }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Total Harga
                    </label>

                    <input
                        type="number"
                        name="total_harga"
                        class="form-control"
                        value="{{ old('total_harga',$penjualan->total_harga) }}"
                        required>

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('penjualan.index') }}" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-save">
                    💾 Update Penjualan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection