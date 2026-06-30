@extends('layouts.admin')

@section('content')

<style>

.header-card{
    background:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table-card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.btn-add{
    background:#2563eb;
    color:white;
    border:none;
    border-radius:10px;
    padding:10px 18px;
    font-weight:600;
}

.btn-add:hover{
    background:#1d4ed8;
    color:white;
}

.table thead{
    background:#2563eb;
    color:white;
}

.table thead th{
    border:none;
    padding:15px;
    text-align:center;
}

.table tbody td{
    vertical-align:middle;
    text-align:center;
}

.badge-stock{
    color:white;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

.stok-banyak{
    background:#16a34a;
}

.stok-sedikit{
    background:#f59e0b;
}

.stok-habis{
    background:#dc2626;
}

.badge-kategori{
    background:#2563eb;
    color:white;
    padding:6px 12px;
    border-radius:15px;
}

.img-obat{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;
}

.deskripsi{
    max-width:250px;
    text-align:left;
    white-space:normal;
    word-wrap:break-word;
}

</style>

<div class="header-card d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">
            💊 Data Obat
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh data obat pada sistem apotek.
        </p>

    </div>

    <a href="{{ route('obat.create') }}" class="btn btn-add">

        + Tambah Obat

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="table-card">

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>No</th>
<th>Gambar</th>
<th>Kode</th>
<th>Nama Obat</th>
<th>Kategori</th>
<th>Deskripsi</th>
<th>Stok</th>
<th>Harga</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($obat as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

@if($item->gambar)

<img
src="{{ asset('storage/'.$item->gambar) }}"
class="img-obat">

@else

<span class="text-muted">
Tidak Ada
</span>

@endif

</td>

<td>

{{ $item->kode_obat }}

</td>

<td>

{{ $item->nama_obat }}

</td>

<td>

@if($item->kategori)

<span class="badge-kategori">

{{ $item->kategori->nama_kategori }}

</span>

@else

<span class="text-muted">

Belum Ada

</span>

@endif

</td>

<td class="deskripsi">

{{ $item->deskripsi ?? '-' }}

</td>

<td>

@if($item->stok > 10)

<span class="badge-stock stok-banyak">

{{ $item->stok }}

</span>

@elseif($item->stok > 0)

<span class="badge-stock stok-sedikit">

{{ $item->stok }}

</span>

@else

<span class="badge-stock stok-habis">

Habis

</span>

@endif

</td>

<td>

Rp {{ number_format($item->harga_jual,0,',','.') }}

</td>

<td>

<a
href="{{ route('obat.edit',$item->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('obat.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data obat?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="9" class="text-center">

Belum ada data obat.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection