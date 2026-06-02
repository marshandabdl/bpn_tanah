<!DOCTYPE html>
<html>
<head>
    <title>SPK Hak Atas Tanah</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background: linear-gradient(135deg, #0b3d91, #1e5bb8);
            min-height: 100vh;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: 0.3s ease-in-out;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .title-bpn {
            color: #0b3d91;
            font-weight: bold;
        }

        .btn-bpn {
            background-color: #f4b400;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-bpn:hover {
            background-color: #e0a800;
            transform: scale(1.02);
        }

        .form-select:focus {
            border-color: #0b3d91;
            box-shadow: 0 0 0 0.2rem rgba(11,61,145,.25);
        }

        .icon-style {
            color: #0b3d91;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="card card-custom p-4">
        <div class="text-center mb-4">

    <h2 class="fw-bold title-bpn mb-1">
        Sistem Pendukung Keputusan
    </h2>

    <h4 class="text-dark fw-semibold">
        Penentuan Jenis Hak Atas Tanah
    </h4>

    <div style="
        width:80px;
        height:4px;
        background:#f4b400;
        margin:12px auto 0;
        border-radius:5px;">
    </div>

</div>


        <form method="POST" action="{{url('/hitung') }}">
            @csrf

            @if(isset($kriterias) && count($kriterias) > 0)

                <div class="row">

                    @foreach($kriterias as $kriteria)

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">

                                @if($kriteria->nama == "Subjek")
                                    <i class="bi bi-person icon-style"></i>
                                @elseif($kriteria->nama == "Peruntukan")
                                    <i class="bi bi-geo-alt icon-style"></i>
                                @elseif($kriteria->nama == "Luas Tanah")
                                    <i class="bi bi-aspect-ratio icon-style"></i>
                                @elseif($kriteria->nama == "Jangka Waktu")
                                    <i class="bi bi-clock icon-style"></i>
                                @elseif($kriteria->nama == "Status Tanah")
                                    <i class="bi bi-file-earmark-text icon-style"></i>
                                @else
                                    <i class="bi bi-list icon-style"></i>
                                @endif

                                {{ $kriteria->nama }}
                            </label>

                            <select class="form-select"
                                    name="kriteria_{{ $kriteria->id }}" required>

                                <option value="">-- Pilih {{ $kriteria->nama }} --</option>

                                @foreach($kriteria->subKriterias as $sub)
                                    <option value="{{ $sub->id }}">
                                        {{ $sub->nama }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    @endforeach

                </div>

            @else
                <div class="alert alert-danger text-center">
                    Tidak ada data kriteria.
                </div>
            @endif

            <div class="mt-3">
                <button type="submit" class="btn btn-bpn w-100 py-2">
                    <i class="bi bi-calculator"></i> Hitung Rekomendasi
                </button>
            </div>

        </form>

        <div class="text-center mt-4 small text-muted">
            Sistem Pendukung Keputusan • 2026
        </div>

    </div>

</div>

</body>
</html>
