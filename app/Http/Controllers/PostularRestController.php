<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostularPostRequest;
use App\Models\Postulacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostularRestController extends Controller
{
    public function index(){
        $postulars=Postulacion::all();
        return response()->json($postulars,Response::HTTP_OK);
    }
    public function store(PostularPostRequest $request){
        $postular=Postulacion::create($request->all());
        return response()->json([
            'MESSAGE'=>"Registro creado correctamente",
            'postular'=>$postular
        ],Response::HTTP_CREATED);
    }

    public function update(PostularPostRequest $request,$postular){
        $postular=Postulacion::find($postular);
        $postular->update($request->only('ruta_cv','puntaje','estado','egresado_id','trabajo_id'));
        return response()->json([
            'message'=>"Registro actualizado correctamente",
            'postular'=>$postular
        ],Response::HTTP_CREATED);
    }

    public function destroy($postular){
        $postular=Postulacion::find($postular);
        $postular->delete();
        return response()->json([
            'message'=>"Registro eliminado correctamente"
        ],Response::HTTP_OK);
    }
}
