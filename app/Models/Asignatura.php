<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = 'asignaturas';
    protected $fillable = ['nombre', 'acronimo', 'tipo_asignatura_id'];


    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoAsignatura', 'tipo_asignatura_id', );
    }

    public static function active(){
        return Asignatura::where('estado', 1)->get();
    }


}
