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

        <h3>📂 Edit Kategori</h3>

        <p class="mb-0">
            Perbarui informasi kategori obat.
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

        <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori',$kategori->nama_kategori) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="form-control">{{ old('deskripsi',$kategori->deskripsi) }}</textarea>

            </div>

            <div class="mt-4">

                <a href="{{ route('kategori.index') }}" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-save">
                    💾 Update Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection