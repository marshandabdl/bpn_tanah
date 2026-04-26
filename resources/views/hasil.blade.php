<!DOCTYPE html>
<html>
<head>
    <title>Hasil Sistem Pendukung Keputusan</title>

    <!-- Bootstrap -->
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

        .table thead {
            background-color: #0b3d91;
            color: white;
        }

        .disclaimer-box {
            background-color: #fff3cd;
            border-left: 6px solid #f4b400;
            padding: 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .btn-bpn {
            background-color: #f4b400;
            border: none;
            font-weight: bold;
        }

        .btn-bpn:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="card card-custom p-4">

        <h3 class="text-center mb-4 title-bpn">
            Hasil Perhitungan SPK Hak Atas Tanah
        </h3>

        <h5 class="mb-3">Data Pemohon</h5>

        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Dipilih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($input as $nama => $sub)
                    <tr>
                        <td>{{ $nama }}</td>
                        <td>{{ $sub->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h5 class="mb-3">Hasil Perhitungan Alternatif</h5>

        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Alternatif</th>
                        <th>Persentase Kelayakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $ranking = 1; @endphp
                    @foreach($persentase as $kode => $nilai)
                        @if ($nilai > 0)
                        <tr class="{{ $kode == $rekomendasi ? 'table-warning fw-bold' : ''}}">
                            <td>{{ $ranking }}</td>
                            <td>{{ $kode }}</td>
                            <td>{{ number_format($nilai, 2) }} %</td>
                        </tr>
                        @php $ranking++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

<div class="mt-5">

    <h5 class="text-center mb-4 fw-bold">
        Rekomendasi Hak Atas Tanah
    </h5>

    @php
        $isInvalid = str_contains($rekomendasi, 'Tidak ada');
    @endphp

    <div class="d-flex justify-content-center mb-3">
        <div class="px-5 py-3 text-center"
             style="
                background: {{ $isInvalid ? '#dc3545' : '#f4b400' }};
                color: {{ $isInvalid ? 'white' : 'black' }};
                border-radius:50px;
                min-width:350px;
                box-shadow:0 6px 15px rgba(0,0,0,0.2);
             ">

            <span style="font-size:18px; font-weight:600;">
                {{ $rekomendasi }}
            </span>
        </div>
    </div>
</div>


        <div class="mt-3 p-3 bg-light border rounded">
            @if($rekomendasi == "HM")
            Hak Milik adalah hak turun-temurun, terkuat dan terpenuh yang dapat dipunyai orang atas tanah (Pasal 20 UUPA)
            @elseif($rekomendasi == "HGB")
            Hak Guna Bangunan adalah hak untuk mendirikan dan mempunyai bangunan diatas yang bukan miliknya sendiri (Pasal 35 UUPA).
            @elseif($rekomendasi == "HGU")
            Hak Guna Usaha adalah hak untuk mengusahakan tanah negara dalam jangka waktu tertentu bagi perusahaan dibidang pertanian, perikanan, atau peternakan (Pasal 28 UUPA).
            @elseif($rekomendasi == "HP")
            Hak Pakai adalah hak untuk menggunakan dan/atau memungut hasil dari tanah negara atau tanah milik orang lain (Pasal 41 UUPA).
            @endif
        </div>


        <!-- ================= DISCLAIMER ================= -->
        <div class="disclaimer-box mt-4">
            <strong>Disclaimer:</strong><br>
            Website ini <b>tidak terintegrasi langsung</b> dengan sistem resmi Kementerian ATR/BPN.
            Sistem Pendukung Keputusan ini dikembangkan sebagai <b>alat bantu analisis berbasis metode Analytical Hierarchy Process</b>,
            dan bukan merupakan pengganti pertimbangan pakar atau keputusan resmi dari instansi berwenang.
        </div>


        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <a href="{{ url('/') }}" class="btn btn-bpn px-4">
                ← Kembali ke Form
            </a>
            <button onclick="cetakHasil()" class="btn btn-bpn px4">Cetak Hasil</button>
        </div>

    </div>

</div>

<script>
function cetakHasil() {
    const printContents = document.querySelector('.card-custom').innerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = `
        <html>
        <head>
            <title>Hasil SPK Hak Atas Tanah</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { padding: 30px; }
                .btn-bpn, .disclaimer-box { display: none; }
                @media print {
                    .btn-bpn, a[href] { display: none !important; }
                }
            </style>
        </head>
        <body>${printContents}</body>
        </html>
    `;

    window.print();
    document.body.innerHTML = originalContents;
    window.location.reload();
}
</script>
</body>
</html>
