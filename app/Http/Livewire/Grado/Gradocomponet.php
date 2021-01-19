<?php

namespace App\Http\Livewire\Grado;

use App\Models\Grado;
use Livewire\Component;

class Gradocomponet extends Component

{

    public $descripcion, $numero, $grado_id, $updateMode=false;


    public function render()
    {
                $grados=Grado::all();
        return view('livewire.grado.gradocomponet', compact('grados'));
    }

    public function resetInputFields(){
        $this->descripcion='';
        $this->numero='';
        $this->grado_id='';
    }

    public function store(){
        $validated = $this->validate([
            'descripcion' => 'required',
            'numero' => 'required',
        ]);

        if($validated){
            Grado::create([
                'descripcion'=>strtoupper($this->descripcion),
                'numero'=>strtoupper($this->numero)
            ]);
            session()->flash('message', 'Grado Creado Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
                    }
    }

    public function edit($id)
    {
                $this->updateMode = true;
        $grado = Grado::find($id);
        $this->grado_id = $id;
        $this->descripcion = $grado->descripcion;
        $this->numero = $grado->numero;



    }

    public function editEstado($id)
    {
        $this->grado_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'descripcion' => 'required',
            'numero' => 'required',
        ]);

        if ($validatedDate) {
            $grado = Grado::find($this->grado_id);
            $grado->update([
                'descripcion'=>strtoupper($this->descripcion),
                'numero'=>($this->numero)
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Grado Actualizado exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');

        }
    }

    public function updateEstado(){
        $grado = Grado::find($this->grado_id);
        if($grado->estado==1){
            $grado->estado=0;
            $grado->save();
        }else{
            $grado->estado=1;
            $grado->save();
        }
        session()->flash('message', 'Estado Actualizado Exitosamente.');
        $this->emit('closeModalEstado');


    }
}
