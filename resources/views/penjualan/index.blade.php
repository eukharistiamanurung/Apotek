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

.btn-detail{
    background:#0EA5E9;
    color:white;
    border:none;
}

.btn-detail:hover{
    background:#0284C7;
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

.total{
    font-weight:bold;
    color:#16A34A;
}

.badge-status{
    background:#16A34A;
    color:white;
    border-radius:20px;
    padding:6px 12px;
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
    text-align:center;
    vertical-align:middle;
}

.pagination{
    justify-content:center;
    margin-top:25px;
}

</style>

<div class="header-card d-flex justify-content-between align-items-center">

    <div>

        <h2 class="page-title">

            🛒 Data Penjualan

        </h2>

        <p class="page-subtitle mb-0">

            Daftar seluruh transaksi penjualan obat.

        </p>

    </div>

    <a
        href="{{ route('penjualan.create') }}"
        class="btn btn-primary">

        ➕ Tambah Penjualan

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
<th>Kode</th>
<th>Customer</th>
<th>Tanggal</th>
<th>Total</th>
<th>Status</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($penjualan as $item)

<tr>

<td>

{{ $penjualan->firstItem() + $loop->index }}

</td>

<td>

{{ $item->kode_transaksi }}

</td>

<td>

{{ $item->user->name ?? '-' }}

</td>

<td>

{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i') }}

</td>

<td class="total">

Rp {{ number_format($item->total_harga,0,',','.') }}

</td>

<td>

<span class="badge-status">

Selesai

</span>

</td>

<td>

<a
href="{{ route('penjualan.show',$item->id) }}"
class="btn btn-sm btn-detail">

👁 Detail

</a>

<form
action="{{ route('penjualan.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-sm btn-delete"
onclick="return confirm('Yakin ingin menghapus transaksi ini?')">

🗑 Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-4">

Belum ada transaksi.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@if($penjualan->hasPages())

<div class="mt-4">

{{ $penjualan->links('pagination::bootstrap-5') }}

</div>

@endif

</div>

@endsection