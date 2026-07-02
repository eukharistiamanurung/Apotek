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
    padding:25px;
}

.form-label{
    font-weight:600;
    color:#334155;
}

.form-control{
    border-radius:12px;
    border:1px solid #CBD5E1;
    padding:12px;
}

.form-control:focus{
    border-color:#2563EB;
    box-shadow:0 0 0 .15rem rgba(37,99,235,.15);
}

.btn-save{
    background:#2563EB;
    color:white;
    border:none;
    border-radius:12px;
    padding:12px 24px;
    font-weight:600;
}

.btn-save:hover{
    background:#1D4ED8;
    color:white;
}

.btn-back{
    background:#64748B;
    color:white;
    text-decoration:none;
    border-radius:12px;
    padding:12px 24px;
    font-weight:600;
}

.btn-back:hover{
    background:#475569;
    color:white;
}

.alert{
    border-radius:15px;
}

</style>

<div class="mb-4">

    <h2 class="page-title">

        ✏️ Edit Supplier

    </h2>

    <p class="page-subtitle">

        Perbarui informasi supplier yang sudah terdaftar.

    </p>

</div>

<div class="card card-custom">

    <div class="card-header-custom">

        <h4 class="mb-0">

            📝 Form Edit Supplier

        </h4>

    </div>

    <div class="card-body p-4">

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mt-2 mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">

                        Nama Supplier

                    </label>

                    <input
                        type="text"
                        name="nama_supplier"
                        class="form-control"
                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                        placeholder="Masukkan nama supplier"
                        required>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">

                        Nomor Telepon

                    </label>

                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon', $supplier->telepon) }}"
                        placeholder="Contoh: 081234567890"
                        required>

                </div>

                <div class="col-12 mb-4">

                    <label class="form-label">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control"
                        placeholder="Masukkan alamat supplier"
                        required>{{ old('alamat', $supplier->alamat) }}</textarea>

                </div>

                <div class="col-12 mb-4">

                    <label class="form-label">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $supplier->email) }}"
                        placeholder="supplier@email.com">

                </div>

            </div>

            <div class="d-flex gap-2">

                <a
                    href="{{ route('supplier.index') }}"
                    class="btn btn-back">

                    ← Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-save">

                    💾 Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection