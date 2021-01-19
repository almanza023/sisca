<?php

namespace App\Http\Livewire\Tipoasignatura;

use App\Models\TipoAsignatura;
use Livewire\Component;

class TipoAsignaturaComponet extends Component
{
    public $nombre,  $tipo_id, $updateMode=false, $model;

    function __construct() {
       $this->model=TipoAsignatura::class;
    }

    public function render()
    {
        $tipos=$this->model::all();
        return view('livewire.tipoasignatura.tipo-asignatura-componet', compact('tipos'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->tipo_id='';
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
        ]);

        if($validated){
            $this->model::create([
                'nombre'=>strtoupper($this->nombre)
            ]);
            session()->flash('message', 'Tipo Asignatura  Creada Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $obj = $this->model::find($id);
        $this->tipo_id = $id;
        $this->nombre = $obj->nombre;
    }

    public function editEstado($id)
    {
        $this->tipo_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
        ]);

        if ($validatedDate) {
            $obj = $this->model::find($this->tipo_id);
            $obj->update([
                'nombre'=>strtoupper($this->nombre),
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Tipo Asignatura Actualizada exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');

        }
    }

    public function updateEstado(){
        $obj = $this->model::find($this->tipo_id);
        if($obj->estado==1){
            $obj->estado=0;
            $obj->save();
        }else{
            $obj->estado=1;
            $obj->save();
        }
        session()->flash('message', 'Estado Actualizado Exitosamente.');
        $this->emit('closeModalEstado');

    }
}
