<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fecha_publication' =>'required',
            'categoria' =>'required',
            'description' =>'required',
            'salario' =>'required',
            'fecha_inicio' =>'required',
            'fecha_fin' =>'required',
            'requiere_experiencia' =>'required',
            'modalidad_tiempo' =>'required',
            'beneficios' =>'required',
            'datos_contacto' =>'required',
            'titulo' =>'required',
            'antecedentes' =>'required',
            'estado' =>'required',
            'empresa_id'=>'required',
        ];
    }
}
