<?php

namespace App\Http\Livewire\Logro;

use App\Models\CargaAcademica;
use App\Models\Docente;
use App\Models\Grado;
use App\Models\LogroAcademico;
use App\Models\Periodo;
use App\Models\TipoLogro;
use Livewire\Component;

class LogroComponet extends Component
{
    public $asignatura, $grado, $descripcion, $logros, $tipo,
     $periodo, $updateMode=false, $logro_id='';

    function __construct() {
        $this->model=LogroAcademico::class;
     }

    public function render()
    {
        $asignaturas='';
        $cargas='';
        $docente=auth()->user()->usable_id;
        $grados=CargaAcademica::gradosDocente($docente);
        $tipos=TipoLogro::active();
        $periodos=Periodo::active();
        if(!empty($this->grado)){
        $asignaturas=CargaAcademica::asignaturasDocente($docente, $this->grado);
        return view('livewire.logro.logro-componet', compact('grados', 'tipos', 'asignaturas', 'periodos'));
        }
        return view('livewire.logro.logro-componet', compact('grados', 'tipos', 'periodos'));
    }

    public function resetInputFields(){
        $this->grado='';
        $this->asignatura='';
        $this->periodo='';
        $this->tipo='';
        $this->descripcion='';
    }

    private function reglas(){
        return [
            'grado' => 'required',
            'asignatura' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'periodo' => 'required'


        ];
    }

    private function data(){
        $doc=Docente::find(auth()->user()->usable_id);
        return [
            'grado_id'=>($this->grado),
            'asignatura_id'=>($this->asignatura),
            'sede_id'=>($doc->sede_id),
            'periodo_id'=>($this->periodo),
            'descripcion'=>($this->descripcion),
            'tipo_logro_id'=>($this->tipo),
        ];
    }

    public function store(){
        $validated = $this->validate($this->reglas());
        if($validated){
            $this->model::create($this->data());
            session()->flash('message', 'Datos Registrados Exitosamente.');
            $this->resetInputFields();
        }
    }

    public function filtrar(){

        $this->logros=LogroAcademico::filtro($this->grado, $this->asignatura, $this->periodo);
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $obj = $this->model::find($id);
        $this->logro_id = $id;
        $this->grado = $obj->grado_id;
        $this->periodo = $obj->periodo_id;
        $this->tipo = $obj->tipo_logro_id;
        $this->asignatura=$obj->asignatura_id;
        $this->descripcion=$obj->descripcion;
    }

    public function update()
    {
        $validatedDate = $this->validate($this->reglas());

        if ($validatedDate) {
            $obj = $this->model::find($this->logro_id);
            $obj->update($this->data());
            $this->updateMode = false;
            session()->flash('message', 'Datos Actualizados Exitosamente.');
            $this->resetInputFields();
            $this->emit('closeModal');

        }
    }


}
