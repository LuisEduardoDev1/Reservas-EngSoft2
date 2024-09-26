<?php

use App\Http\Controllers\CadastrosController;
use App\Http\Controllers\TipoUserController;
use App\Http\Controllers\UsrController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('inicio');})->name('inicio');


Route::get('/cadastro/publico', function() {return view('cadastro.publico');})->name('cadastroPubl');
Route::post('/cadastro/publico', [UsrController::class, 'cadastrar']);

Route::get('/login', function(){return view('login');})->name('login');
Route::post('/login', [UsrController::class, 'logar']);
Route::get('/logout', [UsrController::class, 'logout'])->name('logout');

Route::middleware(['auth', TipoUserController::class])->group(function () {
    Route::get('/usuario/{id_usuario}/edit', [UsrController::class, 'edit'])->name('editUser');
    Route::put('/usuarios/{id_usuario}', [UsrController::class, 'update'])->name('updtUser');
    Route::get('/cadastro/salas', function () {return view('cadastro.salas');})->name('PrefCadastroSalas');
    Route::post('/cadastro/salas', [CadastrosController::class, 'cadastroSala']);
    Route::get('/show/salas', [CadastrosController::class, 'index'])->name('UsrShowSalas');
    
});