<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Invoice {{ $penjualan->kode_transaksi }}</title>

<style>

body{

    font-family: DejaVu Sans, sans-serif;
    font-size:13px;
    color:#333;

}

h2{

    text-align:center;
    margin-bottom:5px;

}

p{

    margin:3px 0;

}

table{

    width:100%;
    border-collapse:collapse;
    margin-top:20px;

}

table th{

    background:#2563eb;
    color:white;
    padding:10px;
    border:1px solid #000;

}

table td{

    border:1px solid #000;
    padding:8px;

}

.text-center{

    text-align:center;

}

.text-right{

    text-align:right;

}

.total{

    font-size:18px;
    font-weight:bold;

}

.footer{

    margin-top:40px;
    text-align:center;
    font-size:12px;
    color:#777;

}

</style>

</head>

<body>

<h2>

APOTEK SEHAT

</h2>

<p class="text-center">

Jl. Contoh No.123, Medan

</p>

<hr>

<table border="0">

<tr>

<td width="170">

<b>Kode Transaksi</b>

</td>

<td>

: {{ $penjualan->kode_transaksi }}

</td>

</tr>

<tr>

<td>

<b>Tanggal</b>

</td>

<td>

: {{ \Carbon\Carbon::parse($penjualan->tanggal)->format('d-m-Y H:i') }}

</td>

</tr>

<tr>

<td>

<b>Customer</b>

</td>

<td>

: {{ $penjualan->user->name ?? '-' }}

</td>

</tr>

</table>

<table>

<thead>

<tr>

<th>No</th>
<th>Nama Obat</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Subtotal</th>

</tr>

</thead>

<tbody>

@foreach($penjualan->detailPenjualans as $detail)

<tr>

<td class="text-center">

{{ $loop->iteration }}

</td>

<td>

{{ $detail->obat->nama_obat }}

</td>

<td class="text-right">

Rp {{ number_format($detail->harga,0,',','.') }}

</td>

<td class="text-center">

{{ $detail->jumlah }}

</td>

<td class="text-right">

Rp {{ number_format($detail->subtotal,0,',','.') }}

</td>

</tr>

@endforeach

<tr>

<td colspan="4" class="text-right">

<b>Total</b>

</td>

<td class="text-right total">

Rp {{ number_format($penjualan->total_harga,0,',','.') }}

</td>

</tr>

</tbody>

</table>

<div class="footer">

Terima kasih telah berbelanja di <b>Apotek Sehat</b>.

<br>

Semoga lekas sembuh 😊

</div>

</body>

</html>