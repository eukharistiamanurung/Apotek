<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Apotek</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            background:#f1f5f9;
            font-family:Arial, Helvetica, sans-serif;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            background:#0f172a;
            color:white;
            padding:20px;
        }

        .sidebar h3{
            text-align:center;
            margin-bottom:30px;
            font-weight:bold;
        }

        .sidebar a{
            display:block;
            text-decoration:none;
            color:white;
            padding:12px;
            margin-bottom:8px;
            border-radius:10px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#2563eb;
        }

        .content{
            margin-left:260px;
            padding:30px;
        }

        .navbar-custom{
            background:white;
            border-radius:15px;
            padding:15px 25px;
            margin-bottom:25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 3px 10px rgba(0,0,0,.08);
        }

        .logout button{
            border:none;
            background:#dc2626;
            color:white;
            padding:8px 18px;
            border-radius:10px;
        }

        .logout button:hover{
            background:#b91c1c;
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h3>💊 APOTEKKU</h3>

    <a href="{{ route('dashboard') }}">🏠 Dashboard</a>

    <a href="{{ route('obat.index') }}">💊 Data Obat</a>

    <a href="{{ route('supplier.index') }}">🚚 Supplier</a>

    <a href="{{ route('kategori.index') }}">📂 Kategori</a>

    <a href="{{ route('penjualan.index') }}">🛒 Penjualan</a>

</div>

<div class="content">

    <div class="navbar-custom">

        <h4>Dashboard Admin</h4>

        <div class="logout">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>

        </div>

    </div>

    @yield('content')

</div>

</body>
</html>