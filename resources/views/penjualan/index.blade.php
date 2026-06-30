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

.btn-delete{
    background:#dc2626;
    color:white;
    border:none;
}

.btn-delete:hover{
    background:#b91c1c;
    color:white;
}

.total{
    font-weight:bold;
    color:#16a34a;
}

</style>

<div class="header-card d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">
            🛒 Riwayat Penjualan
        </h2>

        <p class="text-muted mb-0">
            Daftar seluruh transaksi yang telah dilakukan.
        </p>

    </div>

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
<th>Kode Transaksi</th>
<th>Tanggal</th>
<th>Total Harga</th>
<th width="120">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($penjualan as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

{{ $item->kode_transaksi }}

</td>

<td>

{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i') }}

</td>

<td class="total">

Rp {{ number_format($item->total_harga,0,',','.') }}

</td>

<td>

<form
action="{{ route('penjualan.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-danger btn-sm btn-delete"
onclick="return confirm('Yakin ingin menghapus transaksi ini?')">

🗑 Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center text-muted">

Belum ada transaksi.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection