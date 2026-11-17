<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
//    return Inertia::render('Inicio');
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');//automaticamente nos va a cargar las rutas en base a los nombres de los archivos .vue
})->where('any', '.*'); // por ejemplo el archivo Estudiante.vue se buscaria en el navegador con http://127.0.0.1:8000/Estudiante , por esta razon no sera necesario crear nuevas rutas aqui


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
