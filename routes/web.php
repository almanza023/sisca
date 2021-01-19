<?php

use App\Http\Livewire\Asginatura\AsignaturaComponet;
use App\Http\Livewire\CargaAcademica\CargaAcademicaComponet;
use App\Http\Livewire\CargaAcademica\RegistroCargaComponet;
use App\Http\Livewire\Docente\DocenteComponet;
use App\Http\Livewire\Grado\Gradocomponet;
use App\Http\Livewire\Logro\LogroComponet;
use App\Http\Livewire\Periodo\PeriodoComponet;
use App\Http\Livewire\SedeComponent;
use App\Http\Livewire\Tipoasignatura\TipoAsignaturaComponet;
use App\Http\Livewire\Tipologro\TipoLogroComponet;
use App\Http\Livewire\Usuario\UsuarioComponet;
use App\Models\TipoAsignatura;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sedes', SedeComponent::class)->name('sedes');
Route::get('grados', Gradocomponet::class)->name('grados');
Route::get('periodos', PeriodoComponet::class)->name('periodos');
Route::get('tipo-asignaturas', TipoAsignaturaComponet::class)->name('tipo-asignaturas');
Route::get('asignaturas', AsignaturaComponet::class)->name('asignaturas');
Route::get('docentes', DocenteComponet::class)->name('docentes');
Route::get('tipo-logros', TipoLogroComponet::class)->name('tipo-logros');
Route::get('registro-carga', RegistroCargaComponet::class)->name('registro-carga');
Route::get('carga-academicas', CargaAcademicaComponet::class)->name('carga-academica');
Route::get('usuarios', UsuarioComponet::class)->name('usuarios');
Route::get('logros', LogroComponet::class)->name('logros');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
