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

.header-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.btn-add{
    background:#2563EB;
    color:white;
    border:none;
    border-radius:12px;
    padding:10px 18px;
    font-weight:600;
}

.btn-add:hover{
    background:#1D4ED8;
    color:white;
}

.table{
    margin-bottom:0;
}

.table thead{
    background:#2563EB;
    color:white;
}

.table thead th{
    border:none;
    text-align:center;
    padding:15px;
}

.table tbody td{
    vertical-align:middle;
    text-align:center;
}

.nama-supplier{
    font-weight:600;
    color:#2563EB;
}

.alamat{
    max-width:250px;
    white-space:normal;
    text-align:left;
}

.badge-telp{
    background:#10B981;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.email{
    color:#2563EB;
}

.btn-edit{
    background:#F59E0B;
    color:white;
    border:none;
}

.btn-edit:hover{
    background:#D97706;
    color:white;
}

.btn-delete{
    background:#DC2626;
    color:white;
    border:none;
}

.btn-delete:hover{
    background:#B91C1C;
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

            🏢 Data Supplier

        </h2>

        <p class="page-subtitle mb-0">

            Kelola seluruh supplier obat pada sistem apotek.

        </p>

    </div>

    <a
        href="{{ route('supplier.create') }}"
        class="btn btn-add">

        ➕ Tambah Supplier

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
<th>Nama Supplier</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Email</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($supplier as $item)

<tr>

<td>

{{ $supplier->firstItem() + $loop->index }}

</td>

<td>

<span class="nama-supplier">

{{ $item->nama_supplier }}

</span>

</td>

<td class="alamat">

{{ $item->alamat }}

</td>

<td>

<span class="badge-telp">

{{ $item->telepon }}

</span>

</td>

<td>

@if($item->email)

<span class="email">

{{ $item->email }}

</span>

@else

-

@endif

</td>

<td>

<a
href="{{ route('supplier.edit',$item->id) }}"
class="btn btn-sm btn-edit">

✏ Edit

</a>

<form
action="{{ route('supplier.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-sm btn-delete"
onclick="return confirm('Yakin ingin menghapus supplier ini?')">

🗑 Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center py-4">

Belum ada data supplier.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@if($supplier->hasPages())

<div class="mt-4">

{{ $supplier->links('pagination::bootstrap-5') }}

</div>

@endif

</div>

@endsection