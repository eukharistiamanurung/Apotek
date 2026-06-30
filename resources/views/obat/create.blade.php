@extends('layouts.admin')

@section('content')

<style>

.card-custom{
    background:white;
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.card-header-custom{
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
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
}

.btn-back:hover{
    background:#4b5563;
    color:white;
}

.preview{
    width:200px;
    height:200px;
    object-fit:cover;
    border-radius:12px;
    margin-top:15px;
    display:none;
    border:1px solid #ddd;
}

</style>

<div class="card card-custom">

    <div class="card-header-custom">

        <h3>💊 Tambah Data Obat</h3>

        <p class="mb-0">
            Tambahkan data obat baru ke dalam sistem.
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

        <form
            action="{{ route('obat.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row">

                {{-- Kategori --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Kategori

                    </label>

                    <select
                        name="kategori_id"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($kategori as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('kategori_id')==$item->id ? 'selected' : '' }}>

                                {{ $item->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Kode --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Kode Obat

                    </label>

                    <input
                        type="text"
                        name="kode_obat"
                        class="form-control"
                        value="{{ old('kode_obat') }}"
                        required>

                </div>

                {{-- Nama --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Nama Obat

                    </label>

                    <input
                        type="text"
                        name="nama_obat"
                        class="form-control"
                        value="{{ old('nama_obat') }}"
                        required>

                </div>

                {{-- Stok --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Stok

                    </label>

                    <input
                        type="number"
                        name="stok"
                        class="form-control"
                        value="{{ old('stok') }}"
                        required>

                </div>

                {{-- Harga --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Harga Jual

                    </label>

                    <input
                        type="number"
                        name="harga_jual"
                        class="form-control"
                        value="{{ old('harga_jual') }}"
                        required>

                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">

                    <label class="form-label">

                        Deskripsi Obat

                    </label>

                    <textarea
                        name="deskripsi"
                        rows="5"
                        class="form-control"
                        placeholder="Masukkan deskripsi obat...">{{ old('deskripsi') }}</textarea>

                </div>

                {{-- Upload Gambar --}}
                <div class="col-md-12 mb-3">

                    <label class="form-label">

                        Gambar Obat

                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">

                        Format: JPG, JPEG, PNG, WEBP (Maksimal 2 MB)

                    </small>

                    <br>

                    <img
                        id="preview"
                        class="preview">

                </div>

            </div>

            <div class="mt-4">

                <a
                    href="{{ route('obat.index') }}"
                    class="btn-back">

                    ← Kembali

                </a>

                <button
                    type="submit"
                    class="btn-save">

                    💾 Simpan Data

                </button>

            </div>

        </form>

    </div>

</div>

<script>

const gambar = document.getElementById('gambar');

gambar.addEventListener('change', function(e){

    let preview = document.getElementById('preview');

    let file = e.target.files[0];

    if(file){

        preview.src = URL.createObjectURL(file);

        preview.style.display='block';

    }

});

</script>

@endsection