<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>SIPATAN - Sistem Pendukung Keputusan Tanah</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
            font-family:'Segoe UI', sans-serif;
            background:#f8f9fc;
        }

        .navbar{
            padding:15px 0;
        }

        .navbar-brand{
            font-weight:700;
            font-size:22px;
            color:#0B3D91;
        }

        .nav-link{
            font-weight:500;
            color:#444;
            margin-left:10px;
        }

        .nav-link:hover{
            color:#0B3D91;
        }

        .btn-konsultasi{
            background:#f5b400;
            color:white;
            border-radius:30px;
            padding:10px 22px;
            font-weight:600;
            text-decoration:none;
            transition:0.3s;
        }

        .btn-konsultasi:hover{
            background:#e0a200;
            color:white;
        }

        .hero{
            padding:140px 0 100px 0;
            background:linear-gradient(135deg,#f7f8fb,#eef2ff);
        }

        .hero h1{
            font-size:58px;
            color:#0B3D91;
        }

        .hero h3{
            color:#5a6cae;
            margin-top:10px;
        }

        .hero p{
            margin-top:15px;
            color:#666;
        }

        .btn-start{
            background:#f5b400;
            border:none;
            padding:14px 32px;
            border-radius:30px;
            color:white;
            font-weight:600;
            margin-top:25px;
            transition:0.3s;
        }

        .btn-start:hover{
            background:#e0a200;
        }

        .hero img{
            width:100%;
            max-width:420px;
        }

        .section{
            padding:90px 0;
        }

        .section-title{
            font-weight:700;
            color:#0B3D91;
            margin-bottom:40px;
            text-align:center;
        }

        .card-hak {
            border:none;
            border-radius:16px;
            padding:25px;
            background:white;
            box-shadow:0 8px 30px rgba(0,0,0,0.05);
            transition:0.3s;
            height:100%;
        }

        .card-hak:hover{
            transform:translateY(-5px);
            box-shadow:0 12px 40px rgba(0,0,0,0.08);
        }

        .step-box{
            background:white;
            padding:25px;
            border-radius:16px;
            box-shadow:0 6px 20px rgba(0,0,0,0.05);
            height:100%;
        }

        .footer{
            background:#0b3d91;
            color:white;
            padding:30px;
            text-align:center;
            margin-top:60px;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">SIPATAN</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cara">Cara Penggunaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jenis">Jenis Hak</a>
                        </li>
                    </ul>

                    <a href="/form" class="btn-konsultasi">
                        Mulai Konsultasi
                    </a>
                </div>
            </div>
        </nav>

        <section class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>SIPATAN</h1>
                        <h3>Sistem Pendukung Keputusan Penentuan Hak Atas Tanah</h3>
                        <p>Sistem berbasis web yang membantu masyarakat menentukan jenis hak atas tanah menggunakan metode AHP secara cepat dan mudah.</p>

                        <a href="/form">
                            <button class="btn-start">Mulai Konsultasi</button>
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('images/sipatan.png') }}" alt="Logo SIPATAN">
                    </div>
                </div>
            </div>
        </section>

        <section id="tentang" class="section">
            <div class="container">
                <h2 class="section-title">Tentang Sistem</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Deskripsi</h5>
                        <p>SIPATAN merupakan sistem berbasis web yang membantu pemohon menentukan jenis hak atas tanah yang sesuai dengan kondisi tanah dan tujuan penggunaannya.</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Metode</h5>
                        <p>Sistem menggunakan metode Analytical Hierarchy Process (AHP) untuk menghitung bobot setiap kriteria sehingga dapat memberikan rekomendasi yang paling sesuai.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="cara" class="section bg-light">
            <div class="container">
                <h2 class="section-title">Cara Penggunaan</h2>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="step-box">
                            <h5>1. Mulai Konsultasi</h5>
                            <p>Klik tombol mulai konsultasi untuk memulai proses rekomendasi.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box">
                            <h5>2. Isi Data</h5>
                            <p>Masukkan informasi seperti subjek, luas tanah, lokasi, status dan jangka waktu.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box">
                            <h5>3. Proses AHP</h5>
                            <p>Sistem akan menghitung bobot menggunakan metode AHP.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box">
                            <h5>4. Hasil</h5>
                            <p>Sistem menampilkan rekomendasi hak atas tanah yang paling sesuai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="jenis" class="section">
            <div class="container">
                <h2 class="section-title">Jenis Hak Atas Tanah</h2>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card-hak">
                            <h5>Hak Milik</h5>
                            <p>Hak turun-temurun, terkuat dan terpenuh yang dapat dimiliki oleh warga negara.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-hak">
                            <h5>Hak Guna Bangunan</h5>
                            <p>Hak untuk mendirikan dan memiliki bangunan di atas tanah yang bukan miliknya.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-hak">
                            <h5>Hak Guna Usaha</h5>
                            <p>Hak untuk mengusahakan tanah untuk kegiatan pertanian atau perkebunan.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-hak">
                            <h5>Hak Pakai</h5>
                            <p>Hak untuk menggunakan tanah milik negara atau pihak lain.</p>
                        </div>
                    </div>
                </div>

                <br>
                <div class="alert alert-warning mt-4">
                    <strong>Disclaimer:</strong><br>
                    Website ini tidak terintegrasi langsung dengan sistem resmi Kementerian ATR/BPN.
                    Sistem ini hanya merupakan alat bantu analisis berbasis metode AHP,
                    dan bukan pengganti keputusan resmi atau pertimbangan pakar pertanahan.
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>© 2026 SIPATAN - Sistem Pendukung Keputusan Penentuan Hak Atas Tanah</p>
            <p>Dikembangkan untuk penelitian skripsi Sistem Informasi</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
