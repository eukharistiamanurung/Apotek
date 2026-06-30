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
    }

    .table tbody td{
        vertical-align:middle;
    }

    .btn-edit{
        background:#facc15;
        color:black;
        border:none;
    }

    .btn-edit:hover{
        background:#eab308;
        color:black;
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

</style>

<div class="header-card d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">
            🏢 Data Supplier
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh data supplier apotek.
        </p>

    </div>

    <a href="{{ route('supplier.create') }}" class="btn btn-add">
        + Tambah Supplier
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

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_supplier }}</td>

                    <td>{{ $item->alamat }}</td>

                    <td>{{ $item->telepon }}</td>

                    <td>{{ $item->email }}</td>

                    <td>

                        <a href="{{ route('supplier.edit',$item->id) }}"
                           class="btn btn-warning btn-sm btn-edit">

                            Edit

                        </a>

                        <form action="{{ route('supplier.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm btn-delete"
                                onclick="return confirm('Yakin ingin menghapus supplier ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center text-muted">

                        Belum ada data supplier.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection