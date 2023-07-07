<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;
    public function egresado()
    {
        return $this->belongsTo(Egresado::class);
    }

    public function trabajo()
    {
        return $this->belongsTo(Trabajo::class);
    }
}
