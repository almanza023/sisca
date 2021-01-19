<?php

namespace App\Http\Livewire;

use App\Models\Sede;
use Livewire\Component;

class SedeComponent extends Component
{
    public $nombre, $direccion, $telefono, $dane, $sede_id, $updateMode=false;
    protected $listeners = ['resetInputFields'];
    public function render()
    {
        $sedes=Sede::all();
        return view('livewire.sede.sede-component', compact('sedes'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->direccion='';
        $this->telefono='';
        $this->dane='';
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        if($validated){
            Sede::create([
                'nombre'=>strtoupper($this->nombre),
                'direccion'=>strtoupper($this->direccion),
                'telefono'=>$this->telefono,
                'dane'=>$this->dane
            ]);
            session()->flash('message', 'Sede creada exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = Sede::where('id',$id)->first();
        $this->sede_id = $id;
        $this->nombre = $user->nombre;
        $this->direccion = $user->direccion;
        $this->telefono = $user->telefono;
        $this->dane = $user->dane;

    }

    public function editEstado($id)
    {
        $this->sede_id = $id;

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
            'direccion' => 'required',
        ]);

        if ($this->sede_id) {
            $sede = Sede::find($this->sede_id);
            $sede->update([
                'nombre'=>strtoupper($this->nombre),
                'direccion'=>strtoupper($this->direccion),
                'telefono'=>$this->telefono,
                'dane'=>$this->dane
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Sede Actualizada exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function updateEstado(){
        $sede = Sede::find($this->sede_id);
        if($sede->estado==1){
            $sede->estado=0;
            $sede->save();
        }else{
            $sede->estado=1;
            $sede->save();
        }
        session()->flash('message', 'Estado Actualizado Exitosamente.');
        $this->emit('closeModalEstado');

    }
}
