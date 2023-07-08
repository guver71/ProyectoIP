<?php

namespace App\Http\Livewire;

use App\Models\Postularoferta;
use App\Models\Postulacion;
use App\Models\Trabajo;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudPostularoferta extends Component
{
    //abrir ventana
    public $isOpen=false;
    //buscador
    public $search,$postularoferta;
    //reglas de validacion, enlace para la variable category
    protected $rules=[
        'postularoferta.name'=>'required',
        'postularoferta.slug'=>'required',
    ];
    //escuchador
    protected $listeners=['render','delete'=>'delete'];


    public function render()
    {
        $postularofertas=Postulacion::where('ruta_cv','LIKE','%'.$this->search.'%')->paginate(6);
        return view('livewire.crud-postularoferta', compact('postularofertas'));
    }
    public function create(){
        $this->isOpen=true;
    }
    public function store(){
        $this->validate();
        if(!isset($this->postularoferta['id'])){
            Postulacion::create($this->postularoferta);
        }else{
            $postularoferta=Postulacion::find($this->postularoferta['id']);
            $postularoferta->name=$this->postularoferta['name'];
            $postularoferta->slug=$this->postularoferta['slug'];
            $postularoferta->save();
        }

        $this->reset(['isOpen','postularoferta']);
        $this->emitTo('CrudPostularoferta','render');

    }

    public function delete(Postulacion $item){
        $item->delete();
    }

    public function edit($postularoferta){
        $this->postularoferta=$postularoferta;
        $this->isOpen=true;
    }

    public function updatedPostularofertaName(){
        $this->postularoferta['slug']=Str::slug($this->postularoferta['ruta_cv']);
     }

}
