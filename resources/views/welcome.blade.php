<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApotekKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#0f172a,#1e293b);
            min-height:100vh;
            color:white;
        }

        .hero{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card-hero{
            width:700px;
            background:rgba(255,255,255,.05);
            backdrop-filter:blur(15px);
            border-radius:25px;
            padding:60px;
            text-align:center;
            box-shadow:0 0 40px rgba(0,0,0,.4);
        }

        .logo{
            font-size:70px;
        }

        .title{
            font-size:50px;
            font-weight:bold;
            margin-top:10px;
        }

        .subtitle{
            color:#cbd5e1;
            margin-top:20px;
            margin-bottom:40px;
            line-height:30px;
            font-size:18px;
        }

        .btn-login{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            border:none;
            padding:14px;
            border-radius:12px;
            font-weight:bold;
            width:260px;
            margin-bottom:15px;
        }

        .btn-login:hover{
            color:white;
            opacity:.9;
        }

        .btn-register{
            background:linear-gradient(135deg,#16a34a,#22c55e);
            color:white;
            border:none;
            padding:14px;
            border-radius:12px;
            font-weight:bold;
            width:260px;
        }

        .btn-register:hover{
            color:white;
            opacity:.9;
        }

        footer{
            margin-top:35px;
            color:#94a3b8;
        }

    </style>

</head>
<body>

<div class="container hero">

    <div class="card-hero">

        <div class="logo">
            💊
        </div>

        <h1 class="title">
            APOTEKKU
        </h1>

        <p class="subtitle">
            Selamat datang di Sistem Informasi Apotek.<br>
            Kelola data obat, supplier, kategori,
            penjualan, dan pembelian obat secara mudah,
            cepat, dan aman.
        </p>

        <div class="d-grid justify-content-center">

            <a href="{{ route('login') }}"
               class="btn btn-login">
                🔐 Login
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-register">
                📝 Register Customer
            </a>

        </div>

        <footer>
            © 2026 Sistem Informasi Apotek
        </footer>

    </div>

</div>

</body>
</html>