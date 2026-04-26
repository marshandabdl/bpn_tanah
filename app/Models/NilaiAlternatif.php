<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $fillable = ['alternatif_id', 'sub_kriteria', 'nilai'];
    public function alternatif() {
        return $this->belongsTo(Alternatif::class);
    }

    public function subKriteria() {
        return $this->belongsTo(SubKriteria::class);
    }
}
