<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsuarioComponet extends Component
{

    public $password, $docente, $confirm_password, $user_id, $email, $updateMode=false, $model;

    function __construct() {
        $this->model=User::class;
     }

    public function render()
    {
        $docentes=Docente::all();
        $usuarios=User::all();
        return view('livewire.usuario.usuario-componet', compact('docentes', 'usuarios'));
    }

    public function resetInputFields(){
        $this->docente='';
        $this->confirm_password='';
        $this->password='';

    }

    public function store(){
        $validated = $this->validate([
            'docente' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if($validated){
            if($this->password==$this->confirm_password){
                $part = explode("-", $this->docente);
            $doc=Docente::find($part[0]);
            $this->model::create([
                'name'=>strtoupper($doc->nombres.' '.$doc->apellidos),
                'email'=>strtoupper($doc->correo),
                'documento'=>($part[1]),
                'tipo'=>$doc->tipo,
                'password'=>(Hash::make($this->password)),
                'usable_id'=>($part[0]),
            ]);
            session()->flash('message', 'Datos Registrados Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
            }else{
                session()->flash('error', 'Contraseñas no coinciden.');
            }
        }
    }
    public function editEstado($id)
    {
        $this->user_id = $id;

    }

    public function edit($id)
    {
       $this->updateMode = true;
       $obj=$this->model::find($id);
       $this->email=$obj->email;
       $this->user_id=$id;
    }

    public function update(){

        $obj = $this->model::find($this->user_id);
        if(!empty($this->password) && !empty($this->confirm_password)){
            if($this->password==$this->confirm_password){

            $obj->update([
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
            ]);
            session()->flash('message', 'Datos Actualizados Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
            }else{
                session()->flash('error', 'Contraseñas no coinciden.');
            }
        }else{
            $obj->update([
                'email'=>$this->email,
            ]);
            session()->flash('message', 'Datos Actualizados Correo Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function updateEstado(){
        $obj = $this->model::find($this->user_id);
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
