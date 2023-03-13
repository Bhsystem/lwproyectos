<?php


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

Route::middleware(['auth:sanctum'])->get('/', function () {
    return view('dashboard');
});

route::get('welcome',function(){
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('proyectos')->middleware(['auth:sanctum'])->group(function(){
    route::get('/',App\Http\Livewire\Proyectos\Index::class)->name('proyectos.index');
    route::get('create',App\Http\Livewire\Proyectos\Save::class)->name('proyectos.create');
    route::get('/{id}',App\Http\Livewire\Proyectos\Show::class)->name('proyectos.show');
    
    // Etapas
    //route::get('etapas/{id}',App\Http\Livewire\Proyectos\Show::class)->name('etapas.create');
    
});

Route::prefix('definiciones')->middleware(['auth:sanctum'])->group(function(){
    route::get('',App\Http\Livewire\Definicion\Index::class)->name('definiciones.index');
});

Route::prefix('informes')->middleware(['auth:sanctum'])->group(function(){
    route::get('',App\Http\Livewire\Informes\Index::class)->name('informes.index');
});
