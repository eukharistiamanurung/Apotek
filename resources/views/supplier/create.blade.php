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

        <h3>🏢 Tambah Supplier</h3>

        <p class="mb-0">
            Tambahkan supplier baru ke dalam sistem apotek.
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

        <form action="{{ route('supplier.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nama Supplier
                    </label>

                    <input
                        type="text"
                        name="nama_supplier"
                        class="form-control"
                        value="{{ old('nama_supplier') }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Telepon
                    </label>

                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon') }}"
                        required>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        class="form-control"
                        required>{{ old('alamat') }}</textarea>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}">

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('supplier.index') }}" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-save">
                    💾 Simpan Supplier
                </button>

            </div>

        </form>

    </div>

</div>

@endsection