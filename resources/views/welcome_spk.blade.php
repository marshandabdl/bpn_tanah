<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar - Hak Atas Tanah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background: linear-gradient(135deg, #0b3d91, #1e5bb8);
            min-height: 100vh;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .title-bpn {
            color: #0b3d91;
            font-weight: bold;
        }

        .btn-bpn {
            background-color: #f4b400;
            border: none;
            font-weight: bold;
        }

        .btn-bpn:hover {
            background-color: #e0a800;
        }

        .section-title {
            color: #0b3d91;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="card card-custom p-5">

        <h2 class="text-center title-bpn mb-2">
            Sistem Pakar
        </h2>

        <h4 class="text-center mb-4">
            Penentuan Jenis Hak Atas Tanah
        </h4>

        <hr>

        <p>
            Sistem ini dikembangkan untuk membantu masyarakat dalam memahami jenis hak atas tanah
            berdasarkan ketentuan <strong>Undang-Undang Pokok Agraria (UUPA)</strong>
            dan peraturan pelaksanaannya yang diatur oleh Kementerian ATR/BPN.
        </p>

        <div class="section-title">1. Hak Milik (HM)</div>
        <p>
            Berdasarkan Pasal 20 UUPA, Hak Milik adalah hak turun-temurun, terkuat dan terpenuh
            yang dapat dipunyai orang atas tanah. Hak ini hanya dapat dimiliki oleh Warga Negara Indonesia.
        </p>

        <div class="section-title">2. Hak Guna Usaha (HGU)</div>
        <p>
            Berdasarkan Pasal 28 UUPA, Hak Guna Usaha adalah hak untuk mengusahakan tanah yang
            dikuasai langsung oleh negara untuk perusahaan pertanian, perikanan atau peternakan
            dalam jangka waktu tertentu.
        </p>

        <!-- ================= HGB ================= -->
        <div class="section-title">3. Hak Guna Bangunan (HGB)</div>
        <p>
            Berdasarkan Pasal 35 UUPA, Hak Guna Bangunan adalah hak untuk mendirikan dan mempunyai
            bangunan atas tanah yang bukan miliknya sendiri, dengan jangka waktu tertentu.
        </p>

        <!-- ================= HP ================= -->
        <div class="section-title">4. Hak Pakai (HP)</div>
        <p>
            Berdasarkan Pasal 41 UUPA, Hak Pakai adalah hak untuk menggunakan dan/atau memungut
            hasil dari tanah yang dikuasai langsung oleh negara atau tanah milik orang lain.
            Hak ini dapat diberikan kepada WNI, badan hukum Indonesia, maupun WNA sesuai ketentuan.
        </p>

        <!-- ================= PERKBPN ================= -->
        <div class="section-title">Landasan Peraturan Tambahan</div>
        <p>
            Ketentuan lebih lanjut mengenai pemberian hak atas tanah diatur dalam berbagai
            Peraturan Menteri ATR/BPN terkait pendaftaran tanah, jangka waktu,
            serta subjek dan objek hak atas tanah.
        </p>

        <div style="margin-top:20px; padding:15px; background:#f9fbe7; border-left:5px solid #2e7d32; text-align:justify;">
        <p>
            Sistem ini merupakan <b>Sistem Pakar</b> yang
            menggunakan metode <b>Analytical Hierarchy Process (AHP)</b>
            untuk membantu menentukan jenis hak atas tanah berdasarkan
            berbagai kriteria seperti subjek, luas tanah, peruntukkan,
            lokasi, status tanah, dan jangka waktu.
        </p>

        <p>
            Proses perhitungan dilakukan melalui pembobotan kriteria,
            normalisasi matriks, pengujian konsistensi (CR), dan
            perangkingan alternatif secara objektif. Rekomendasi yang
            dihasilkan juga disesuaikan dengan ketentuan
            <b>Undang-Undang Pokok Agraria (UUPA)</b>.
        </p>
    </div>


        <!-- ================= DISCLAIMER ================= -->
        <div class="alert alert-warning mt-4">
            <strong>Disclaimer:</strong><br>
            Website ini tidak terintegrasi langsung dengan sistem resmi Kementerian ATR/BPN.
            Sistem ini hanya merupakan alat bantu analisis berbasis metode AHP,
            dan bukan pengganti keputusan resmi atau pertimbangan pakar pertanahan.
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/form') }}" class="btn btn-bpn px-4 py-2">
                Lanjut ke Sistem →
            </a>
        </div>

    </div>

</div>

</body>
</html>
