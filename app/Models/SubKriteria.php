<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $fillable = ['kriteria_id','nama','bobot_lokal'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
