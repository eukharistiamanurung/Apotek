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

    display:none;

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

        <i class="bi bi-capsule"></i>

        Tambah Data Obat

    </h2>

    <p class="page-subtitle">

        Tambahkan data obat baru ke dalam sistem apotek.

    </p>

</div>

<div class="card card-custom">

<div class="card-header-custom">

<h4 class="mb-0">

<i class="bi bi-plus-circle"></i>

Form Tambah Obat

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
action="{{ route('obat.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

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
{{ old('kategori_id')==$item->id ? 'selected' : '' }}>

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
value="{{ old('kode_obat') }}"
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
value="{{ old('nama_obat') }}"
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
value="{{ old('stok') }}"
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
value="{{ old('harga_jual') }}"
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
placeholder="Masukkan deskripsi obat...">{{ old('deskripsi') }}</textarea>

</div>

<div class="col-md-12">

<label class="form-label">

Upload Gambar

</label>

<input
type="file"
id="gambar"
name="gambar"
class="form-control"
accept=".jpg,.jpeg,.png,.webp">

<div class="preview-box mt-3">

<img
id="preview"
class="preview">

<p class="text-muted mt-3 mb-0">

Preview gambar akan muncul di sini.

</p>

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

Simpan Data

</button>

</div>

</form>

</div>

</div>

<script>

document.getElementById('gambar').addEventListener('change',function(e){

const file=e.target.files[0];

const preview=document.getElementById('preview');

if(file){

preview.src=URL.createObjectURL(file);

preview.style.display='block';

}

});

</script>

@endsection