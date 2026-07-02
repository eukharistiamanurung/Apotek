@extends('layouts.admin')

@section('content')

<style>

body{
    background:#f1f5f9;
    font-family:'Segoe UI',sans-serif;
}

.page-title{
    font-weight:700;
    color:#1e293b;
}

.page-subtitle{
    color:#64748b;
}

.dashboard-header{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:white;
    border-radius:20px;
    padding:30px;
    margin-bottom:30px;
    box-shadow:0 10px 25px rgba(37,99,235,.20);
}

.dashboard-header h2{
    font-weight:bold;
    margin-bottom:10px;
}

.dashboard-header p{
    margin:0;
    opacity:.9;
}

.date-box{

    background:white;

    color:#1e293b;

    padding:15px 20px;

    border-radius:15px;

    font-weight:600;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.card-stat{

    border:none;

    border-radius:18px;

    overflow:hidden;

    transition:.3s;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.card-stat:hover{

    transform:translateY(-6px);

}

.bg-obat{

    background:linear-gradient(135deg,#3b82f6,#2563eb);

}

.bg-supplier{

    background:linear-gradient(135deg,#10b981,#059669);

}

.bg-kategori{

    background:linear-gradient(135deg,#f59e0b,#d97706);

}

.bg-customer{

    background:linear-gradient(135deg,#06b6d4,#0891b2);

}

.bg-penjualan{

    background:linear-gradient(135deg,#8b5cf6,#7c3aed);

}

.bg-pendapatan{

    background:linear-gradient(135deg,#ef4444,#dc2626);

}

.card-stat .card-body{

    color:white;

    padding:25px;

}

.card-stat .icon{

    font-size:45px;

    opacity:.3;

    float:right;

}

.card-stat h6{

    font-size:15px;

    margin-bottom:15px;

}

.card-stat h2{

    font-weight:bold;

    margin:0;

}

.section-card{

    border:none;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    background:white;

}

.section-title{

    font-size:22px;

    font-weight:bold;

    color:#1e293b;

}

.quick-btn{

    border-radius:15px;

    padding:18px;

    font-weight:600;

    transition:.3s;

}

.quick-btn:hover{

    transform:translateY(-3px);

}

.table thead{

    background:#2563eb;

    color:white;

}

.badge-stock{

    background:#dc2626;

    color:white;

    border-radius:15px;

    padding:6px 12px;

}

</style>

<div class="dashboard-header">

<div class="row align-items-center">

<div class="col-lg-8">

<h2>

👋 Selamat Datang,
{{ auth()->user()->name }}

</h2>

<p>

Semoga harimu menyenangkan.
Selamat bekerja di Sistem Informasi Apotek.

</p>

</div>

<div class="col-lg-4 text-end">

<div class="date-box">

{{ now()->translatedFormat('l, d F Y') }}

</div>

</div>

</div>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="card card-stat bg-obat">

<div class="card-body">

<div class="icon">

💊

</div>

<h6>Total Obat</h6>

<h2>

{{ $totalObat }}

</h2>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card card-stat bg-supplier">

<div class="card-body">

<div class="icon">

🚚

</div>

<h6>Total Supplier</h6>

<h2>

{{ $totalSupplier }}

</h2>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card card-stat bg-kategori">

<div class="card-body">

<div class="icon">

🏷️

</div>

<h6>Total Kategori</h6>

<h2>

{{ $totalKategori }}

</h2>

</div>

</div>

</div>

<div class="col-lg-4">

    <div class="card card-stat bg-customer">

        <div class="card-body">

            <div class="icon">

                👤

            </div>

            <h6>Total Customer</h6>

            <h2>

                {{ $totalCustomer }}

            </h2>

        </div>

    </div>

</div>

<div class="col-lg-4">

    <div class="card card-stat bg-penjualan">

        <div class="card-body">

            <div class="icon">

                🛒

            </div>

            <h6>Total Penjualan</h6>

            <h2>

                {{ $totalPenjualan }}

            </h2>

        </div>

    </div>

</div>

<div class="col-lg-4">

    <div class="card card-stat bg-pendapatan">

        <div class="card-body">

            <div class="icon">

                💰

            </div>

            <h6>Total Pendapatan</h6>

            <h2>

                Rp {{ number_format($totalPendapatan,0,',','.') }}

            </h2>

        </div>

    </div>

</div>

</div>

{{-- Quick Action --}}

<div class="card section-card mt-5">

    <div class="card-body">

        <h4 class="section-title mb-4">

            ⚡ Quick Menu

        </h4>

        <div class="row g-3">

            <div class="col-md-3">

                <a href="{{ route('obat.create') }}"
                   class="btn btn-primary quick-btn w-100">

                    ➕ Tambah Obat

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('kategori.create') }}"
                   class="btn btn-warning quick-btn w-100">

                    🏷 Tambah Kategori

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('supplier.create') }}"
                   class="btn btn-success quick-btn w-100">

                    🚚 Tambah Supplier

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('penjualan.index') }}"
                   class="btn btn-danger quick-btn w-100">

                    🛒 Data Penjualan

                </a>

            </div>

        </div>

    </div>

</div>

{{-- Grafik Penjualan --}}

<div class="card section-card mt-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="section-title">

                📈 Grafik Penjualan

            </h4>

            <span class="badge bg-primary">

                7 Hari Terakhir

            </span>

        </div>

        <canvas id="grafikPenjualan" height="100"></canvas>

    </div>

</div> 


<div class="row mt-4">

    {{-- Obat Terlaris --}}
    <div class="col-lg-6">

        <div class="card section-card">

            <div class="card-body">

                <h4 class="section-title mb-4">

                    🏆 Obat Terlaris

                </h4>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>Nama Obat</th>
                                <th>Total Terjual</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($obatTerlaris as $item)

                            <tr>

                                <td>

                                    {{ $item->nama_obat }}

                                </td>

                                <td>

                                    <span class="badge bg-success">

                                        {{ $item->total_terjual }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="2" class="text-center">

                                    Belum ada data.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    {{-- Stok Menipis --}}
    <div class="col-lg-6">

        <div class="card section-card">

            <div class="card-body">

                <h4 class="section-title mb-4">

                    ⚠️ Stok Hampir Habis

                </h4>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>Nama Obat</th>
                                <th>Stok</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($stokMenipis as $item)

                            <tr>

                                <td>

                                    {{ $item->nama_obat }}

                                </td>

                                <td>

                                    <span class="badge-stock">

                                        {{ $item->stok }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="2" class="text-center">

                                    Semua stok masih aman.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Aktivitas Terbaru --}}

<div class="card section-card mt-4">

    <div class="card-body">

        <h4 class="section-title mb-4">

            📝 Aktivitas Terbaru

        </h4>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Total</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($transaksiTerbaru as $item)

                    <tr>

                        <td>

                            {{ $item->kode_transaksi }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                        </td>

                        <td>

                            Rp {{ number_format($item->total_harga,0,',','.') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center">

                            Belum ada transaksi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('grafikPenjualan');

new Chart(ctx,{

    type:'line',

    data:{

        labels:@json($labelGrafik),

        datasets:[{

            label:'Jumlah Penjualan',

            data:@json($dataGrafik),

            borderColor:'#2563eb',

            backgroundColor:'rgba(37,99,235,.15)',

            fill:true,

            tension:.4,

            borderWidth:3,

            pointRadius:5,

            pointBackgroundColor:'#2563eb'

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{

                display:true

            }

        },

        scales:{

            y:{

                beginAtZero:true

            }

        }

    }

});

</script>

@endsection