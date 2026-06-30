<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Customer')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f7fb;
        }

        .navbar{
            background:#2563eb;
        }

        .navbar-brand{
            color:white !important;
            font-weight:bold;
            font-size:22px;
        }

        .nav-link{
            color:white !important;
            margin-right:15px;
            font-weight:500;
        }

        .nav-link:hover{
            color:#ffe082 !important;
        }

        .content{
            margin-top:30px;
            margin-bottom:50px;
        }

        .user-name{
            color:white;
            margin-right:20px;
            font-weight:bold;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="{{ route('customer.dashboard') }}">
            💊 APOTEKKU
        </a>

        <button
            class="navbar-toggler bg-light"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            ☰

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('customer.dashboard') }}">

                        🏠 Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('katalog.index') }}">

                        💊 Katalog

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('customer.cart') }}">

                        🛒 Keranjang

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('customer.riwayat') }}">

                        📋 Riwayat

                    </a>

                </li>

                <li class="nav-item">

                    <span class="user-name">

                        👤 {{ auth()->user()->name }}

                    </span>

                </li>

                <li class="nav-item">

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button class="btn btn-danger btn-sm">

                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container content">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>