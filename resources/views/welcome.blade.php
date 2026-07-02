<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ApotekKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;

}

body{

    min-height:100vh;

    background:
    linear-gradient(rgba(15,23,42,.75),rgba(15,23,42,.85)),
    url('https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    overflow-x:hidden;

}

.container-page{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px;

}

.main-card{

    width:1200px;

    min-height:650px;

    background:rgba(255,255,255,.10);

    backdrop-filter:blur(18px);

    border-radius:30px;

    overflow:hidden;

    display:flex;

    box-shadow:0 25px 50px rgba(0,0,0,.35);

    border:1px solid rgba(255,255,255,.15);

}

.left-side{

    width:55%;

    color:white;

    padding:70px 60px;

    position:relative;

}

.right-side{

    width:45%;

    background:white;

    padding:60px;

    display:flex;

    justify-content:center;

    align-items:center;

}

.logo-img{

    width:130px;

    height:130px;

    object-fit:contain;

    background:white;

    padding:15px;

    border-radius:25px;

    box-shadow:0 15px 30px rgba(0,0,0,.25);

    margin-bottom:25px;

}

.title{

    font-size:52px;

    font-weight:700;

    margin-bottom:10px;

}

.subtitle{

    font-size:18px;

    color:#dbeafe;

    line-height:33px;

    margin-bottom:35px;

}

.feature-box{

    display:flex;

    align-items:center;

    background:rgba(255,255,255,.10);

    padding:18px;

    border-radius:18px;

    margin-bottom:18px;

    transition:.3s;

}

.feature-box:hover{

    transform:translateX(10px);

    background:rgba(255,255,255,.18);

}

.feature-icon{

    width:55px;

    height:55px;

    border-radius:50%;

    background:#22c55e;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:24px;

    margin-right:18px;

}

.feature-title{

    font-size:18px;

    font-weight:600;

}

.feature-desc{

    color:#d1d5db;

    font-size:14px;

}

.login-card{

    width:100%;

}

.login-title{

    font-size:36px;

    font-weight:700;

    color:#1e293b;

    margin-bottom:10px;

}

.login-subtitle{

    color:#64748b;

    margin-bottom:35px;

}

.btn-login{

    width:100%;

    background:linear-gradient(135deg,#2563eb,#3b82f6);

    color:white;

    border:none;

    padding:15px;

    border-radius:15px;

    font-size:18px;

    font-weight:600;

    transition:.3s;

    margin-bottom:18px;

}

.btn-login:hover{

    transform:translateY(-3px);

    color:white;

}

.btn-register{

    width:100%;

    background:linear-gradient(135deg,#16a34a,#22c55e);

    color:white;

    border:none;

    padding:15px;

    border-radius:15px;

    font-size:18px;

    font-weight:600;

    transition:.3s;

}

.btn-register:hover{

    transform:translateY(-3px);

    color:white;

}

.footer{

    margin-top:35px;

    text-align:center;

    color:#94a3b8;

    font-size:14px;

}

.circle1{

    width:250px;

    height:250px;

    background:#3b82f6;

    position:absolute;

    top:-120px;

    left:-120px;

    border-radius:50%;

    opacity:.15;

}

.circle2{

    width:200px;

    height:200px;

    background:#22c55e;

    position:absolute;

    bottom:-90px;

    right:-90px;

    border-radius:50%;

    opacity:.15;

}

@media(max-width:992px){

.main-card{

flex-direction:column;

}

.left-side,.right-side{

width:100%;

}

.left-side{

padding:40px;

}

.right-side{

padding:40px;

}

.title{

font-size:38px;

}

}

</style>

</head>

<body>

<div class="container-page">

<div class="main-card">

<div class="left-side">

<div class="circle1"></div>

<div class="circle2"></div>

<!-- Logo -->

<img
    src="{{ asset('images/apotek.png') }}"
    class="logo-img"
    alt="Logo ApotekKu">

<h1 class="title">

    APOTEKKU

</h1>

<p class="subtitle">

    Sistem Informasi Apotek modern untuk membantu pengelolaan
    obat, supplier, kategori, penjualan, dan pembelian secara
    cepat, aman, dan efisien.

</p>

<!-- Feature 1 -->

<div class="feature-box">

    <div class="feature-icon">

        💊

    </div>

    <div>

        <div class="feature-title">

            Manajemen Obat

        </div>

        <div class="feature-desc">

            Kelola data obat lengkap beserta stok, harga,
            kategori, gambar dan deskripsi.

        </div>

    </div>

</div>

<!-- Feature 2 -->

<div class="feature-box">

    <div class="feature-icon">

        📦

    </div>

    <div>

        <div class="feature-title">

            Supplier Terintegrasi

        </div>

        <div class="feature-desc">

            Mengelola supplier obat beserta alamat,
            email dan nomor telepon.

        </div>

    </div>

</div>

<!-- Feature 3 -->

<div class="feature-box">

    <div class="feature-icon">

        🛒

    </div>

    <div>

        <div class="feature-title">

            Penjualan Digital

        </div>

        <div class="feature-desc">

            Seluruh transaksi penjualan tercatat
            otomatis beserta invoice.

        </div>

    </div>

</div>

<!-- Feature 4 -->

<div class="feature-box">

    <div class="feature-icon">

        📊

    </div>

    <div>

        <div class="feature-title">

            Dashboard Modern

        </div>

        <div class="feature-desc">

            Menampilkan statistik, grafik penjualan,
            dan laporan secara realtime.

        </div>

    </div>

</div>

</div>

<!-- RIGHT SIDE -->

<div class="right-side">

<div class="login-card">

<h2 class="login-title">

    Selamat Datang 👋

</h2>

<p class="login-subtitle">

    Masuk untuk mengelola Sistem Informasi Apotek
    atau daftar sebagai customer baru.

</p>

<div class="d-grid">

    <a
        href="{{ route('login') }}"
        class="btn btn-login">

        🔐 Login

    </a>

    <a
        href="{{ route('register') }}"
        class="btn btn-register">

        📝 Register Customer

    </a>

</div>

<hr class="my-4">

<div class="row text-center">

    <div class="col-4">

        <h4 class="fw-bold text-primary">

            100+

        </h4>

        <small class="text-muted">

            Data Obat

        </small>

    </div>

    <div class="col-4">

        <h4 class="fw-bold text-success">

            24

        </h4>

        <small class="text-muted">

            Jam Layanan

        </small>

    </div>

    <div class="col-4">

        <h4 class="fw-bold text-warning">

            100%

        </h4>

        <small class="text-muted">

            Aman

        </small>

    </div>

</div>

<div class="footer">

    © {{ date('Y') }}

    <br>

    <strong>APOTEKKU</strong>

    <br>

    Sistem Informasi Apotek Berbasis Laravel

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>