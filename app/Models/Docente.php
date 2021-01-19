<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $fillable = [ 'sede_id','nombres', 'apellidos', 'documento', 'correo', 'telefono', 'escalafo',
     'especialidad', 'nivel', 'tipo', 'estado'];


     public function sede()
    {
        return $this->belongsTo('App\Models\Sede', 'sede_id', );
    }


    public static function getDocente(){
        return Docente::where('tipo', 1)->where('estado', 1)->get();
    }
}
