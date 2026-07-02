@extends('layouts.admin')

@section('content')

<style>

.stat-card{
    border:none;
    border-radius:18px;
    color:white;
    padding:20px;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-4px);
}

.bg-obat{
    background:linear-gradient(135deg,#2563EB,#3B82F6);
}

.bg-kategori{
    background:linear-gradient(135deg,#8B5CF6,#7C3AED);
}

.bg-stok{
    background:linear-gradient(135deg,#10B981,#059669);
}

.table-card{
    background:white;
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table thead th{
    background:#2563EB;
    color:white;
    text-align:center;
    vertical-align:middle;
}

.table tbody td{
    vertical-align:middle;
    text-align:center;
}

.img-obat{
    width:70px;
    height:70px;
    border-radius:12px;
    object-fit:cover;
}

.badge-kategori{
    background:#2563EB;
    color:white;
    padding:7px 12px;
    border-radius:15px;
}

.stok-banyak{
    background:#10B981;
}

.stok-sedikit{
    background:#F59E0B;
}

.stok-habis{
    background:#EF4444;
}

.badge-stock{
    color:white;
    padding:6px 12px;
    border-radius:20px;
}

.deskripsi{
    text-align:left;
    max-width:220px;
}

.btn-add{
    border-radius:12px;
}

</style>

<h2 class="fw-bold mb-4">

💊 Data Obat

</h2>

<div class="row mb-4">

<div class="col-md-4">

<div class="stat-card bg-obat">

<h6>Total Obat</h6>

<h2>{{ $totalObat }}</h2>

</div>

</div>

<div class="col-md-4">

<div class="stat-card bg-kategori">

<h6>Total Kategori</h6>

<h2>{{ $totalKategori }}</h2>

</div>

</div>

<div class="col-md-4">

<div class="stat-card bg-stok">

<h6>Total Stok</h6>

<h2>{{ $totalStok }}</h2>

</div>

</div>

</div>

<div class="table-card">

<div class="card-body">

<div class="d-flex justify-content-between mb-4">

<form method="GET">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Cari nama atau kode obat..."
value="{{ $search }}">

<button class="btn btn-primary">

Cari

</button>

</div>

</form>

<a
href="{{ route('obat.create') }}"
class="btn btn-success btn-add">

+ Tambah Obat

</a>

</div>

<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>

<th>No</th>
<th>Gambar</th>
<th>Kode</th>
<th>Nama</th>
<th>Kategori</th>
<th>Deskripsi</th>
<th>Stok</th>
<th>Harga</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($obat as $item)

<tr>

<td>

{{ $obat->firstItem()+$loop->index }}

</td>

<td>

@if($item->gambar)

<img
src="{{ asset('storage/'.$item->gambar) }}"
class="img-obat">

@else

-

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

-

@endif

</td>

<td class="deskripsi">

{{ Str::limit($item->deskripsi,50) }}

</td>

<td>

@if($item->stok>10)

<span class="badge-stock stok-banyak">

{{ $item->stok }}

</span>

@elseif($item->stok>0)

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

✏

</a>

<form
action="{{ route('obat.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">

🗑

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="9">

Belum ada data obat.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-4">

{{ $obat->links() }}

</div>

</div>

</div>

@endsection