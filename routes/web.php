<?php

use App\Http\Controllers\UsrController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {return view('cadastro');})->name('cadastro');

Route::post('/', [UsrController::class, 'cadastrar']);

Route::get('/login', function(){return view('login');})->name('login');
Route::post('/login', [UsrController::class, 'logar']);
Route::get('/logout', [UsrController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/reservas', function () {return view('reservas');})->name('reservas');
    Route::get('/usuario/{id_usuario}/edit', [UsrController::class, 'edit'])->name('editUser');
    Route::put('/usuarios/{id_usuario}', [UsrController::class, 'update'])->name('updtUser');
});