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

.form-control,
.form-select{
    border-radius:12px;
    border:1px solid #CBD5E1;
    padding:12px;
}

.form-control:focus,
.form-select:focus{
    border-color:#2563EB;
    box-shadow:0 0 0 .15rem rgba(37,99,235,.15);
}

.preview-box{

    border:2px dashed #CBD5E1;
    border-radius:15px;
    padding:20px;
    text-align:center;
    background:#F8FAFC;

}

.preview{

    width:220px;
    height:220px;
    object-fit:cover;
    border-radius:15px;

}

.btn-save{

    background:#2563EB;
    color:white;
    border:none;
    border-radius:12px;
    padding:12px 24px;

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

        ✏ Edit Data Obat

    </h2>

    <p class="page-subtitle">

        Perbarui informasi obat pada sistem.

    </p>

</div>

<div class="card card-custom">

    <div class="card-header-custom">

        <h4 class="mb-0">

            <i class="bi bi-pencil-square"></i>

            Form Edit Obat

        </h4>

    </div>

    <div class="card-body p-4">

        @if($errors->any())

        <div class="alert alert-danger">

            <strong>

                Terjadi kesalahan:

            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <form
            action="{{ route('obat.update',$obat->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Kategori

                    </label>

                    <select
                        name="kategori_id"
                        class="form-select"
                        required>

                        <option value="">

                            Pilih Kategori

                        </option>

                        @foreach($kategori as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('kategori_id',$obat->kategori_id)==$item->id ? 'selected' : '' }}>

                                {{ $item->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Kode Obat

                    </label>

                    <input
                        type="text"
                        name="kode_obat"
                        class="form-control"
                        value="{{ old('kode_obat',$obat->kode_obat) }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Nama Obat

                    </label>

                    <input
                        type="text"
                        name="nama_obat"
                        class="form-control"
                        value="{{ old('nama_obat',$obat->nama_obat) }}"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">

                        Stok

                    </label>

                    <input
                        type="number"
                        name="stok"
                        class="form-control"
                        value="{{ old('stok',$obat->stok) }}"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">

                        Harga Jual

                    </label>

                    <input
                        type="number"
                        name="harga_jual"
                        class="form-control"
                        value="{{ old('harga_jual',$obat->harga_jual) }}"
                        required>

                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea
                        name="deskripsi"
                        rows="5"
                        class="form-control"
                        placeholder="Masukkan deskripsi obat...">{{ old('deskripsi',$obat->deskripsi) }}</textarea>

                </div>

                <div class="col-md-12">

                    <label class="form-label">

                        Ganti Gambar

                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">

                        Kosongkan jika tidak ingin mengganti gambar.

                    </small>

                    <div class="preview-box mt-3">

                        @if($obat->gambar)

                            <img
                                src="{{ asset('storage/'.$obat->gambar) }}"
                                id="preview"
                                class="preview">

                        @else

                            <img
                                id="preview"
                                class="preview"
                                style="display:none;">

                        @endif

                    </div>

                </div>

            </div>

            <div class="mt-4 d-flex gap-2">

                <a
                    href="{{ route('obat.index') }}"
                    class="btn btn-back">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-save">

                    <i class="bi bi-floppy"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('gambar').addEventListener('change',function(e){

    let preview=document.getElementById('preview');

    let file=e.target.files[0];

    if(file){

        preview.src=URL.createObjectURL(file);

        preview.style.display='block';

    }

});

</script>

@endsection