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
            📂 Data Kategori
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh kategori obat.
        </p>

    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-add">
        + Tambah Kategori
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
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($kategori as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_kategori }}</td>

                    <td>{{ $item->deskripsi }}</td>

                    <td>

                        <a href="{{ route('kategori.edit',$item->id) }}"
                           class="btn btn-warning btn-sm btn-edit">

                            Edit

                        </a>

                        <form action="{{ route('kategori.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm btn-delete"
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center text-muted">

                        Belum ada data kategori.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection