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
    border-radius:12px;
    padding:12px 24px;
    text-decoration:none;
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

        ✏ Edit Kategori

    </h2>

    <p class="page-subtitle">

        Perbarui informasi kategori obat.

    </p>

</div>

<div class="card card-custom">

    <div class="card-header-custom">

        <h4 class="mb-0">

            📂 Form Edit Kategori

        </h4>

    </div>

    <div class="card-body p-4">

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>

                    Terjadi kesalahan:

                </strong>

                <ul class="mt-2 mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori',$kategori->nama_kategori) }}"
                    placeholder="Contoh: Antibiotik"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Masukkan deskripsi kategori...">{{ old('deskripsi',$kategori->deskripsi) }}</textarea>

            </div>

            <div class="d-flex gap-2">

                <a
                    href="{{ route('kategori.index') }}"
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