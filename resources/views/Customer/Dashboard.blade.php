@extends('layouts.customer')

@section('title', 'Dashboard Customer')

@section('content')

<div class="row mb-4">

    <div class="col-md-12">

        <div class="card shadow border-0 bg-primary text-white">

            <div class="card-body">

                <h2 class="fw-bold">
                    👋 Selamat Datang,
                    {{ auth()->user()->name }}
                </h2>

                <p class="mb-0">
                    Selamat datang di Sistem Informasi Apotek.
                    Silakan melakukan pembelian obat atau melihat riwayat transaksi Anda.
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h1>💊</h1>

                <h4>Katalog Obat</h4>

                <p>Lihat seluruh obat yang tersedia.</p>

                <a href="{{ route('katalog.index') }}"
                   class="btn btn-primary">
                    Lihat Katalog
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h1>🧾</h1>

                <h4>Riwayat Pembelian</h4>

                <p>Lihat seluruh transaksi Anda.</p>

                <a href="{{ route('customer.riwayat') }}"
                   class="btn btn-success">
                    Lihat Riwayat
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h1>👤</h1>

                <h4>Profil</h4>

                <p>Kelola data akun Anda.</p>

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-warning">
                    Edit Profil
                </a>

            </div>

        </div>

    </div>

</div>

@endsection