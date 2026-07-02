<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>APOTEKKU | Sistem Informasi Apotek</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS -->

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css"
          rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet"
          href="{{ asset('css/welcome.css') }}">

</head>

<body>

<!-- ========================= -->
<!-- NAVBAR -->
<!-- ========================= -->

<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container">

        <a class="navbar-brand"
           href="#">

            💊 APOTEKKU

        </a>

        <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="#tentang">

                        Tentang

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="#layanan">

                        Layanan

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="#kontak">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- ========================= -->
<!-- HERO -->
<!-- ========================= -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6"
     data-aos="fade-right">

<div class="glass">

<span class="badge-promo">

💙 SISTEM INFORMASI APOTEKKU

</span>

   <h1 class="hero-title">

    <span id="typing-title"></span>

</h1>

<p class="hero-desc">

    Solusi modern untuk membantu pengelolaan
    obat, stok, supplier, transaksi,
    serta laporan apotek secara cepat,
    aman, dan efisien.

</p>

    <div class="hero-button">

    <a href="{{ route('login') }}"
    class="btn btn-login">

    <i class="bi bi-box-arrow-in-right"></i>

Login

</a>

<a href="{{ route('register') }}"
   class="btn btn-register">

<i class="bi bi-person-plus-fill"></i>

Register

</a>

</div>

</div>

</div>

<div class="col-lg-6 text-center"
     data-aos="fade-left">

<div class="hero-image-wrapper">

    <img src="{{ asset('animation/gif.gif') }}"
         class="hero-image"
         alt="APOTEKKU Animation">

</div>

</div>

</div>

</div>

</section>

<!-- ========================= -->
<!-- RUNNING BANNER -->
<!-- ========================= -->

<section>

<div class="container">

<div class="running-banner">

<div class="running-track">

<span>💊 Obat Berkualitas & Terjamin</span>

<span>❤️ Konsultasi Dengan Apoteker Profesional</span>

<span>🚚 Pelayanan Cepat & Ramah</span>

<span>📦 Stok Selalu Terupdate</span>

<span>🩺 Pelayanan Kesehatan Terpercaya</span>

<span>💊 Obat Berkualitas & Terjamin</span>

<span>❤️ Konsultasi Dengan Apoteker Profesional</span>

<span>🚚 Pelayanan Cepat & Ramah</span>

<span>📦 Stok Selalu Terupdate</span>

<span>🩺 Pelayanan Kesehatan Terpercaya</span>

</div>

</div>

</div>

</section>

<!-- ========================= -->
<!-- TENTANG -->
<!-- ========================= -->

<section id="tentang" class="section-space">

<div class="container">

<div class="text-center mb-5" data-aos="fade-up">

<span class="section-badge">

Tentang Kami

</span>

<h2 class="section-title">

Mengapa Memilih APOTEKKU?

</h2>

<p class="section-desc">

APOTEKKU merupakan sistem informasi apotek modern yang
dirancang untuk membantu pengelolaan apotek secara
lebih efisien, aman, cepat dan profesional.

</p>

</div>

<div class="row g-4">

<div class="col-lg-4" data-aos="zoom-in">

<div class="service-card">

<div class="service-icon">

💊

</div>

<h4>

Obat Berkualitas

</h4>

<p>

Menyediakan berbagai jenis obat
yang terjamin kualitasnya
serta telah memenuhi standar.

</p>

</div>

</div>

<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="150">

<div class="service-card">

<div class="service-icon">

🩺

</div>

<h4>

Pelayanan Profesional

</h4>

<p>

Melayani pelanggan dengan
cepat, ramah dan dibantu
oleh tenaga profesional.

</p>

</div>

</div>

<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">

<div class="service-card">

<div class="service-icon">

📦

</div>

<h4>

Stok Selalu Terupdate

</h4>

<p>

Sistem selalu memperbarui
stok obat secara otomatis
agar data selalu akurat.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- ========================= -->
<!-- SLOGAN -->
<!-- ========================= -->

<section class="section-space">

<div class="container">

<div class="glass slogan-box"
data-aos="fade-up">

<h2>

💙 APOTEKKU

</h2>

<h3>

"Melayani Dengan Hati,
Menjaga Kesehatan Setiap Hari."

</h3>

<p>

Kami percaya bahwa kesehatan adalah kebutuhan utama.

Melalui Sistem Informasi APOTEKKU,
seluruh proses pelayanan,
pengelolaan stok,
transaksi,
hingga laporan dapat dilakukan
lebih mudah,
lebih cepat,
dan lebih akurat.

</p>

</div>

</div>

</section>

<!-- ========================= -->
<!-- LAYANAN -->
<!-- ========================= -->

<section id="layanan" class="section-space">

<div class="container">

<div class="text-center mb-5">

<span class="section-badge">

Layanan

</span>

<h2 class="section-title">

Layanan APOTEKKU

</h2>

</div>

<div class="row g-4">

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<i class="bi bi-capsule"></i>

<h5>

Manajemen Obat

</h5>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<i class="bi bi-truck"></i>

<h5>

Supplier

</h5>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<i class="bi bi-cart-check"></i>

<h5>

Transaksi

</h5>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<i class="bi bi-bar-chart-fill"></i>

<h5>

Laporan

</h5>

</div>

</div>

</div>

</div>

</section>

<!-- ========================================= -->
<!-- TESTIMONI -->
<!-- ========================================= -->

<section class="section-space">

    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">

            <span class="section-badge">

                Testimoni

            </span>

            <h2 class="section-title">

                Apa Kata Pelanggan?

            </h2>

            <p class="section-desc">

                Kepuasan pelanggan adalah prioritas utama kami.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4" data-aos="fade-up">

                <div class="review-card">

                    <div class="review-star">

                        ★★★★★

                    </div>

                    <p>

                        "Pelayanan sangat cepat,
                        obat lengkap,
                        dan sistemnya mudah digunakan."

                    </p>

                    <h5>

                        Eukharistia

                    </h5>

                </div>

            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="150">

                <div class="review-card">

                    <div class="review-star">

                        ★★★★★

                    </div>

                    <p>

                        "Tampilannya modern,
                        transaksi menjadi jauh lebih mudah."

                    </p>

                    <h5>

                        Lashi

                    </h5>

                </div>

            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">

                <div class="review-card">

                    <div class="review-star">

                        ★★★★★

                    </div>

                    <p>

                        "Sangat membantu dalam
                        mengelola apotek setiap hari."

                    </p>

                    <h5>

                        Samuel Sianturi

                    </h5>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- CALL TO ACTION -->
<!-- ========================================= -->

<section class="section-space">

    <div class="container">

        <div class="glass text-center cta-box" data-aos="zoom-in">

            <h2>

                Siap Menggunakan APOTEKKU?

            </h2>

            <p>

                Kelola apotek Anda dengan sistem yang
                lebih modern, aman, dan efisien.

            </p>

            <div class="mt-4">

                <a href="{{ route('login') }}"
                   class="btn btn-login">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-register">

                    Register

                </a>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- FOOTER -->
<!-- ========================================= -->

<footer id="kontak">

    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-4">

                <h3>

                    💊 APOTEKKU

                </h3>

                <p>

                    Sistem Informasi Apotek berbasis Laravel
                    untuk membantu pengelolaan obat,
                    transaksi,
                    supplier,
                    dan laporan secara modern.

                </p>

            </div>

            <div class="col-lg-4">

                <h4>

                    Menu

                </h4>

                <ul class="footer-menu">

                    <li>

                        <a href="#">

                            Home

                        </a>

                    </li>

                    <li>

                        <a href="#tentang">

                            Tentang

                        </a>

                    </li>

                    <li>

                        <a href="#layanan">

                            Layanan

                        </a>

                    </li>

                    <li>

                        <a href="#kontak">

                            Kontak

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-lg-4">

                <h4>

                    Hubungi Kami

                </h4>

                <p>

                    📍 Medan, Sumatera Utara

                </p>

                <p>

                    📧 admin@apotekku.com

                </p>

                <p>

                    ☎ +62 812-3456-7890

                </p>

            </div>

        </div>

        <hr>

        <div class="text-center footer-copy">

            © {{ date('Y') }}

            APOTEKKU

            <br>

            Sistem Informasi Apotek Berbasis Laravel

        </div>

    </div>

</footer>

<!-- ========================================= -->
<!-- JAVASCRIPT -->
<!-- ========================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="{{ asset('js/welcome.js') }}"></script>

</body>

</html>

