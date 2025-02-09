<?php

use App\Http\Controllers\EditalController;
use App\Http\Controllers\ManifestarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscaController;
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
    return redirect(route('editais.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('editais', EditalController::class);
Route::resource('manifestar', ManifestarController::class);
Route::get('/buscar', [BuscaController::class, 'buscar']);

Route::get('gerenciar', [EditalController::class, 'gerenciar'])->name('gerenciar');
Route::get('profile', [ProfileController::class, 'usuarios'])->name('profile.usuarios');

require __DIR__ . '/auth.php';
