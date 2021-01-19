<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLogro extends Model
{
    use HasFactory;

    protected $table = 'tipo_logros';
    protected $fillable = ['nombre', 'nivel'];

    public static function active(){
        return TipoLogro::where('estado', 1)->get();
    }
}
