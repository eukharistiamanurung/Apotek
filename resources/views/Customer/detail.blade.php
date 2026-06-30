@extends('layouts.customer')

@section('title', 'Detail Obat')

@section('content')

<style>

.detail-card{
    background:white;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    overflow:hidden;
}

.img-obat{
    width:100%;
    height:420px;
    object-fit:cover;
}

.badge-kategori{
    background:#2563eb;
    color:white;
    padding:8px 15px;
    border-radius:20px;
    font-size:14px;
}

.harga{
    color:#16a34a;
    font-size:30px;
    font-weight:bold;
}

.info{
    margin-bottom:12px;
}

.deskripsi{
    background:#f8fafc;
    border-radius:12px;
    padding:15px;
    margin-top:15px;
}

</style>

<div class="container">

<div class="row">

<div class="col-lg-10 mx-auto">

<div class="card detail-card">

<div class="row g-0">

<div class="col-md-5">

@if($obat->gambar)

<img
src="{{ asset('storage/'.$obat->gambar) }}"
class="img-obat">

@else

<img
src="https://via.placeholder.com/500x500?text=Tidak+Ada+Gambar"
class="img-obat">

@endif

</div>

<div class="col-md-7">

<div class="card-body p-4">

<h2 class="fw-bold">

{{ $obat->nama_obat }}

</h2>

@if($obat->kategori)

<span class="badge-kategori">

{{ $obat->kategori->nama_kategori }}

</span>

@endif

<hr>

<div class="info">

<strong>Kode Obat :</strong>

{{ $obat->kode_obat }}

</div>

<div class="info">

<strong>Harga :</strong>

<div class="harga">

Rp {{ number_format($obat->harga_jual,0,',','.') }}

</div>

</div>

<div class="info">

<strong>Stok :</strong>

@if($obat->stok > 10)

<span class="badge bg-success">

{{ $obat->stok }}

</span>

@elseif($obat->stok > 0)

<span class="badge bg-warning text-dark">

Tinggal {{ $obat->stok }}

</span>

@else

<span class="badge bg-danger">

Stok Habis

</span>

@endif

</div>

<div class="deskripsi">

<h5>

📝 Deskripsi

</h5>

<p class="mb-0">

{{ $obat->deskripsi ?? 'Belum ada deskripsi.' }}

</p>

</div>

<div class="mt-4 d-grid gap-2">

@if($obat->stok > 0)

<form
action="{{ route('customer.cart.add',$obat->id) }}"
method="POST">

@csrf

<button
type="submit"
class="btn btn-primary btn-lg">

🛒 Tambah ke Keranjang

</button>

</form>

@else

<button
class="btn btn-secondary btn-lg"
disabled>

Stok Habis

</button>

@endif

<a
href="{{ route('katalog.index') }}"
class="btn btn-outline-secondary">

← Kembali ke Katalog

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

@endsection