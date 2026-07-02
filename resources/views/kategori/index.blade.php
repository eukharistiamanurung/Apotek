@extends('layouts.admin')

@section('content')

<style>

.page-title{
    font-weight:700;
    color:#1e293b;
}

.page-subtitle{
    color:#64748b;
}

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
    border-radius:12px;
    padding:10px 18px;
    font-weight:600;
}

.btn-add:hover{
    background:#1d4ed8;
    color:white;
}

.table{
    margin-bottom:0;
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

.badge-kategori{
    background:#2563eb;
    color:white;
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
}

.deskripsi{
    text-align:left;
    max-width:320px;
    white-space:normal;
}

.btn-edit{
    background:#f59e0b;
    color:white;
    border:none;
}

.btn-edit:hover{
    background:#d97706;
    color:white;
}

.btn-delete{
    background:#dc2626;
    color:white;
    border:none;
}

.btn-delete:hover{
    background:#b91c1c;
    color:white;
}

.pagination{
    justify-content:center;
    margin-top:25px;
}

</style>

<div class="header-card d-flex justify-content-between align-items-center">

    <div>

        <h2 class="page-title">

            📂 Data Kategori

        </h2>

        <p class="page-subtitle mb-0">

            Kelola seluruh kategori obat pada sistem apotek.

        </p>

    </div>

    <a href="{{ route('kategori.create') }}"
       class="btn btn-add">

        ➕ Tambah Kategori

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

<th width="70">No</th>
<th>Nama Kategori</th>
<th>Deskripsi</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($kategori as $item)

<tr>

<td>

{{ $kategori->firstItem() + $loop->index }}

</td>

<td>

<span class="badge-kategori">

{{ $item->nama_kategori }}

</span>

</td>

<td class="deskripsi">

{{ $item->deskripsi ?: '-' }}

</td>

<td>

<a
href="{{ route('kategori.edit',$item->id) }}"
class="btn btn-sm btn-edit">

✏ Edit

</a>

<form
action="{{ route('kategori.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-sm btn-delete"
onclick="return confirm('Yakin ingin menghapus kategori ini?')">

🗑 Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center text-muted py-4">

Belum ada data kategori.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@if($kategori->hasPages())

<div class="mt-4">

{{ $kategori->links('pagination::bootstrap-5') }}

</div>

@endif

</div>

@endsection