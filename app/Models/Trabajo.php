<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
