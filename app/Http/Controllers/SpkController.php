<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\NilaiAlternatif;
use App\Models\SubKriteria;

class SpkController extends Controller
{
    public function form()
    {
        $kriterias = Kriteria::with('subKriterias')->get();
        return view('form', compact('kriterias'));
    }

    public function hitung(Request $request)
{
    $alternatifs = Alternatif::all();
    $kriterias   = Kriteria::with('subKriterias')->get();

    $hasil  = [];
    $alasan = [];
    $input  = [];

    foreach ($kriterias as $kriteria) {
        $subDipilih = $request->input('kriteria_'.$kriteria->id);
        $input[$kriteria->nama] = SubKriteria::find($subDipilih);
    }

    foreach ($alternatifs as $alternatif) {

        $total = 0;
        $hardConstraint = false;

        foreach ($kriterias as $kriteria) {

            $subDipilih = $input[$kriteria->nama] ?? null;
            if (!$subDipilih) continue;

            $nilai = NilaiAlternatif::where('alternatif_id', $alternatif->id)
                ->where('sub_kriteria_id', $subDipilih->id)
                ->first();

            if ($nilai) {
                $total +=
                    $kriteria->bobot_global *
                    $subDipilih->bobot_lokal *
                    $nilai->nilai;
            }
        }

        if ($input['Subjek']->nama == "WNA" &&
            $alternatif->kode != "HP") {

            $total = -1;
            $hardConstraint = true;
            $alasan[$alternatif->kode][] =
                "WNA hanya dapat memperoleh Hak Pakai (UUPA).";
        }

        if ($input['Subjek']->nama == "Badan Hukum" &&
            $alternatif->kode == "HM") {

            $total = -1;
            $hardConstraint = true;
            $alasan[$alternatif->kode][] =
                "Badan hukum tidak dapat memiliki Hak Milik (Pasal 21 UUPA).";
        }

        if ($input['Peruntukkan']->nama != "Pertanian" &&
            $alternatif->kode == "HGU") {

            $total = -1;
            $hardConstraint = true;
            $alasan[$alternatif->kode][] =
                "HGU hanya untuk usaha pertanian (Pasal 28 UUPA).";
        }

        if ($input['Jangka Waktu']->nama == "Tetap" &&
            $alternatif->kode != "HM") {

            $total = -1;
            $hardConstraint = true;
            $alasan[$alternatif->kode][] =
                "Hak selain HM memiliki jangka waktu tertentu.";
        }

        if (!$hardConstraint &&
            $input['Status Tanah']->nama == "Tanah Negara" &&
            $alternatif->kode == "HM") {

            $total *= 0.3;
            $alasan[$alternatif->kode][] =
                "Tanah Negara memerlukan proses pemberian hak.";
        }

        $hasil[$alternatif->kode] = $total;
    }

    $hasilValid = array_filter($hasil, function($v) {
        return $v > 0;
    });

    $totalSemua = array_sum($hasilValid);
    $persentase = [];

    foreach ($hasil as $kode => $nilai) {
        if ($nilai > 0 && $totalSemua > 0) {
            $persentase[$kode] = ($nilai / $totalSemua) * 100;
        } else {
            $persentase[$kode] = 0;
        }
    }

    arsort($persentase);

    $nilaiTertinggi = max($persentase);

    if ($nilaiTertinggi <= 0) {
        $rekomendasi = "Tidak ada hak yang sesuai dengan ketentuan hukum";
    } else {
        $rekomendasi = array_key_first($persentase);
    }

    return view('hasil', compact(
        'hasil',
        'persentase',
        'rekomendasi',
        'alasan',
        'input'
    ));
    }
}
