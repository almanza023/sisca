<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grados';
    protected $fillable = ['descripcion', 'numero'];

    public static function active(){
        return Grado::where('estado', 1)->get();
    }
}
