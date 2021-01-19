<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogroAcademico extends Model
{
    use HasFactory;

    protected $table = 'logro_academicos';
    protected $fillable = ['sede_id', 'grado_id', 'asignatura_id', 'periodo_id', 'tipo_logro_id', 'descripcion'];

    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoLogro', 'tipo_logro_id');
    }

    public function grado()
    {
        return $this->belongsTo('App\Models\Grado', 'grado_id');
    }

    public function sede()
    {
        return $this->belongsTo('App\Models\Sede', 'sede_id');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignatura', 'asignatura_id');
    }

    public static function filtro($grado, $asignatura, $periodo){

        return LogroAcademico::where('asignatura_id', $asignatura)
        ->where('grado_id', $grado)->where('periodo_id', $periodo)->orderBy('periodo_id', 'asc')->get();
    }

}
