<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | Sistem Informasi Apotek</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#F8FAFC;
            font-family:'Segoe UI',sans-serif;
        }

        /* ===========================
            SIDEBAR
        ============================ */

        .sidebar{

            position:fixed;

            top:0;

            left:0;

            width:270px;

            height:100vh;

            background:#0F172A;

            padding:25px;

            overflow-y:auto;

        }

        .logo{

            text-align:center;

            color:white;

            margin-bottom:35px;

        }

        .logo h3{

            font-weight:bold;

            margin-top:10px;

        }

        .menu-title{

            color:#94A3B8;

            font-size:13px;

            text-transform:uppercase;

            margin-bottom:12px;

        }

        .sidebar a{

            display:flex;

            align-items:center;

            gap:12px;

            text-decoration:none;

            color:#CBD5E1;

            padding:14px 16px;

            border-radius:14px;

            margin-bottom:10px;

            transition:.3s;

            font-size:15px;

        }

        .sidebar a:hover{

            background:#2563EB;

            color:white;

            transform:translateX(5px);

        }

        .sidebar a.active{

            background:#2563EB;

            color:white;

        }

        .sidebar i{

            font-size:18px;

        }

        /* ===========================
            CONTENT
        ============================ */

        .content{

            margin-left:270px;

            padding:30px;

        }

        /* ===========================
            NAVBAR
        ============================ */

        .topbar{

            background:white;

            border-radius:18px;

            padding:18px 25px;

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:30px;

            box-shadow:0 5px 20px rgba(0,0,0,.08);

        }

        .welcome h4{

            margin:0;

            font-weight:bold;

            color:#1E293B;

        }

        .welcome small{

            color:#64748B;

        }

        .right-top{

            display:flex;

            align-items:center;

            gap:20px;

        }

        .tanggal{

            color:#64748B;

            font-weight:600;

        }

        .profile{

            display:flex;

            align-items:center;

            gap:10px;

        }

        .avatar{

            width:45px;

            height:45px;

            border-radius:50%;

            background:#2563EB;

            color:white;

            display:flex;

            justify-content:center;

            align-items:center;

            font-weight:bold;

            font-size:18px;

        }

        .logout button{

            background:#EF4444;

            border:none;

            color:white;

            padding:10px 18px;

            border-radius:12px;

            transition:.3s;

        }

        .logout button:hover{

            background:#DC2626;

        }

        @media(max-width:992px){

            .sidebar{

                width:90px;

                padding:15px;

            }

            .sidebar .logo h3,
            .sidebar .menu-title,
            .sidebar span{

                display:none;

            }

            .content{

                margin-left:90px;

            }

            .sidebar a{

                justify-content:center;

            }

        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">

        <i class="bi bi-capsule-pill fs-1 text-info"></i>

        <h3>APOTEKKU</h3>

    </div>

    <div class="menu-title">

        MENU ADMIN

    </div>

    <a href="{{ route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

        <i class="bi bi-speedometer2"></i>

        <span>Dashboard</span>

    </a>

    <a href="{{ route('obat.index') }}"
       class="{{ request()->routeIs('obat.*') ? 'active' : '' }}">

        <i class="bi bi-capsule"></i>

        <span>Data Obat</span>

    </a>

    <a href="{{ route('kategori.index') }}"
       class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">

        <i class="bi bi-tags"></i>

        <span>Kategori</span>

    </a>

    <a href="{{ route('supplier.index') }}"
       class="{{ request()->routeIs('supplier.*') ? 'active' : '' }}">

        <i class="bi bi-truck"></i>

        <span>Supplier</span>

    </a>

    <a href="{{ route('penjualan.index') }}"
       class="{{ request()->routeIs('penjualan.*') ? 'active' : '' }}">

        <i class="bi bi-cart-check"></i>

        <span>Penjualan</span>

    </a>

</div>

<div class="content">

    <div class="topbar">

        <div class="welcome">

            <h4>

                👋 Selamat Datang,
                {{ auth()->user()->name }}

            </h4>

            <small>

                Kelola Sistem Informasi Apotek dengan mudah.

            </small>

        </div>

        <div class="right-top">

            <div class="tanggal">

                {{ now()->translatedFormat('l, d F Y') }}

            </div>

            <div class="profile">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

            </div>

            <div class="logout">

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button type="submit">

                        <i class="bi bi-box-arrow-right"></i>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>