<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AHPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Alternatif::count()>0) {
            return;
        }

        $hm = Alternatif::create(['kode'=>'HM','nama'=>'Hak Milik']);
        $hgb = Alternatif::create(['kode'=>'HGB','nama'=>'Hak Guna Bangunan']);
        $hgu = Alternatif::create(['kode'=>'HGU','nama'=>'Hak Guna Usaha']);
        $hp = Alternatif::create(['kode'=>'HP','nama'=>'Hak Pakai']);

        $subjek = Kriteria::create(['nama'=>'Subjek','bobot_global'=>0.365]);
        $luas = Kriteria::create(['nama'=>'Luas Tanah','bobot_global'=>0.162]);
        $peruntukan = Kriteria::create(['nama'=>'Peruntukan','bobot_global'=>0.131]);
        $lokasi = Kriteria::create(['nama'=>'Lokasi','bobot_global'=>0.069]);
        $status = Kriteria::create(['nama'=>'Status Tanah','bobot_global'=>0.223]);
        $jangka = Kriteria::create(['nama'=>'Jangka Waktu','bobot_global'=>0.051]);

        SubKriteria::create(['kriteria_id'=>$subjek->id,'nama'=>'WNI','bobot_lokal'=>0.663]);
        SubKriteria::create(['kriteria_id'=>$subjek->id,'nama'=>'WNA','bobot_lokal'=>0.106]);
        SubKriteria::create(['kriteria_id'=>$subjek->id,'nama'=>'Badan Hukum','bobot_lokal'=>0.260]);

        SubKriteria::create(['kriteria_id'=>$luas->id,'nama'=>'< 600m²','bobot_lokal'=>0.633]);
        SubKriteria::create(['kriteria_id'=>$luas->id,'nama'=>'600 - 2000m²','bobot_lokal'=>0.260]);
        SubKriteria::create(['kriteria_id'=>$luas->id,'nama'=>'> 2000m²','bobot_lokal'=>0.106]);

        SubKriteria::create(['kriteria_id'=>$peruntukan->id,'nama'=>'Hunian','bobot_lokal'=>0.633]);
        SubKriteria::create(['kriteria_id'=>$peruntukan->id,'nama'=>'Usaha','bobot_lokal'=>0.260]);
        SubKriteria::create(['kriteria_id'=>$peruntukan->id,'nama'=>'Pertanian','bobot_lokal'=>0.106]);

        SubKriteria::create(['kriteria_id'=>$lokasi->id,'nama'=>'Perkotaan','bobot_lokal'=>0.750]);
        SubKriteria::create(['kriteria_id'=>$lokasi->id,'nama'=>'Pedesaan','bobot_lokal'=>0.250]);

        SubKriteria::create(['kriteria_id'=>$status->id,'nama'=>'Tanah Negara','bobot_lokal'=>0.243]);
        SubKriteria::create(['kriteria_id'=>$status->id,'nama'=>'SHM','bobot_lokal'=>0.639]);
        SubKriteria::create(['kriteria_id'=>$status->id,'nama'=>'HPL','bobot_lokal'=>0.118]);

        SubKriteria::create(['kriteria_id'=>$jangka->id,'nama'=>'Tetap','bobot_lokal'=>0.548]);
        SubKriteria::create(['kriteria_id'=>$jangka->id,'nama'=>'< 25 tahun','bobot_lokal'=>0.141]);
        SubKriteria::create(['kriteria_id'=>$jangka->id,'nama'=>'25 - 50 tahun','bobot_lokal'=>0.236]);
        SubKriteria::create(['kriteria_id'=>$jangka->id,'nama'=>'> 50 tahun','bobot_lokal'=>0.075]);

        $alternatifs = Alternatif::all();
        $subs = SubKriteria::all();

        foreach ($alternatifs as $alt) {
            foreach ($subs as $sub) {
                $nilai = 0;

                if ($sub->nama == "WNI") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.558,
                     "HGB" => 0.263,
                     "HGU" => 0.057,
                     "HP" => 0.122,
                    };
                }

                if ($sub->nama == "WNA") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.067,
                     "HGB" => 0.097,
                     "HGU" => 0.194,
                     "HP" => 0.643,
                    };
                }

                if ($sub->nama == "Badan Hukum") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.042,
                     "HGB" => 0.268,
                     "HGU" => 0.558,
                     "HP" => 0.133,
                    };
                }

                if ($sub->nama == "< 600m²") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.558,
                     "HGB" => 0.263,
                     "HGU" => 0.057,
                     "HP" => 0.122,
                    };
                }

                if ($sub->nama == "600 - 2000m²") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.245,
                     "HGB" => 0.543,
                     "HGU" => 0.076,
                     "HP" => 0.136,
                    };
                }

                if ($sub->nama == "> 2000m²") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.245,
                     "HGB" => 0.543,
                     "HGU" => 0.076,
                     "HP" => 0.136,
                    };
                }

                if ($sub->nama == "Hunian") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.558,
                     "HGB" => 0.263,
                     "HGU" => 0.057,
                     "HP" => 0.122,
                    };
                }

                if ($sub->nama == "Usaha") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.076,
                     "HGB" => 0.543,
                     "HGU" => 0.245,
                     "HP" => 0.136,
                    };
                }

                if ($sub->nama == "Pertanian") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.122,
                     "HGB" => 0.263,
                     "HGU" => 0.558,
                     "HP" => 0.057,
                    };
                }

                if ($sub->nama == "Perkotaan") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.263,
                     "HGB" => 0.558,
                     "HGU" => 0.057,
                     "HP" => 0.122,
                    };
                }

                if ($sub->nama == "Pedesaan") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.558,
                     "HGB" => 0.263,
                     "HGU" => 0.122,
                     "HP" => 0.057,
                    };
                }

                if ($sub->nama == "Tanah Negara") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.069,
                     "HGB" => 0.389,
                     "HGU" => 0.389,
                     "HP" => 0.153,
                    };
                }

                if ($sub->nama == "SHM") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.558,
                     "HGB" => 0.263,
                     "HGU" => 0.112,
                     "HP" => 0.057,
                    };
                }

                if ($sub->nama == "HPL") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.057,
                     "HGB" => 0.558,
                     "HGU" => 0.263,
                     "HP" => 0.122,
                    };
                }

                if ($sub->nama == "Tetap") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.700,
                     "HGB" => 0.100,
                     "HGU" => 0.100,
                     "HP" => 0.100,
                    };
                }

                if ($sub->nama == "< 25 Tahun") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.065,
                     "HGB" => 0.158,
                     "HGU" => 0.133,
                     "HP" => 0.645,
                    };
                }

                if ($sub->nama == "25 - 50 Tahun") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.077,
                     "HGB" => 0.506,
                     "HGU" => 0.265,
                     "HP" => 0.152,
                    };
                }

                if ($sub->nama == "> 50 Tahun") {
                    $nilai = match($alt->kode) {
                     "HM" => 0.122,
                     "HGB" => 0.263,
                     "HGU" => 0.558,
                     "HP" => 0.057,
                    };
                }

                NilaiAlternatif::create([
                    'alternatif_id' => $alt->id,
                    'sub_kriteria_id' => $sub->id,
                    'nilai' => $nilai
                ]);
            }
        }
    }
}
