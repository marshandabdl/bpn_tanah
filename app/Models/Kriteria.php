<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubKriteria;

class Kriteria extends Model
{
    protected $fillable = ['nama','bobot_global'];

    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
