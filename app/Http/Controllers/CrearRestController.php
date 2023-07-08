<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearPostRequest;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrearRestController extends Controller
{
    public function index(){
        $crears=Trabajo::all();
        return response()->json($crears,Response::HTTP_OK);
    }
    public function store(CrearPostRequest $request){
        $crear=Trabajo::create($request->all());
        return response()->json([
            'MESSAGE'=>"Registro creado correctamente",
            'crear'=>$crear
        ],Response::HTTP_CREATED);
    }

    public function update(CrearPostRequest $request,$crear){
        $crear=Trabajo::find($crear);
        $crear->update($request->only('fecha_publication', 'categoria', 'description', 'salario', 'fecha_inicio', 'fecha_fin', 'requiere_experiencia', 'modalidad_tiempo', 'beneficios', 'datos_contacto', 'titulo', 'antecedentes', 'estado', 'empresa_id'));
        return response()->json([
            'message'=>"Registro actualizado correctamente",
            'crear'=>$crear
        ],Response::HTTP_CREATED);
    }

    public function destroy($crear){
        $crear=Trabajo::find($crear);
        $crear->delete();
        return response()->json([
            'message'=>"Registro eliminado correctamente"
        ],Response::HTTP_OK);
    }
}
