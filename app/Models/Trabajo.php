<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $fillable=['fecha_publication','categoria','description','salario','fecha_inicio','fecha_fin','requiere_experiencia','modalidad_tiempo','beneficios','datos_contacto','titulo','antecedentes','estado','estado', 'Empresa_id'];
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
