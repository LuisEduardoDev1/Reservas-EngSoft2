<?php

use App\Http\Controllers\CadastrosController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\PrefeituraController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TipoUserController;
use App\Http\Controllers\UsrController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('inicio');})->name('inicio');
Route::get('/escolher', function() {return view('cadastro.escolher');})->name('escolher');


Route::get('/calendario', function () {return view('calendario');})->name('calendario');
Route::get('/escolher', function() {return view('cadastro.escolher');})->name('escolher');

Route::get('/cadastro/publico', function() {return view('cadastro.publico');})->name('cadastroPubl');
Route::post('/cadastro/publico', [UsrController::class, 'cadastrar']);

Route::get('/cadastro/professor', function() {return view('cadastro.professor');})->name('cadastroProfessor');
Route::post('/cadastro/professor', [ProfessorController::class, 'cadastrar']);

Route::get('/cadastro/proReitura', function() {return view('cadastro.proReitura');})->name('cadastroProReitura');

Route::get('/cadastro/prefeitura', function() {return view('cadastro.prefeitura');})->name('cadastroPrefeitura');
Route::post('/cadastro/prefeitura', [PrefeituraController::class, 'cadastrar']);

Route::get('/cadastro/diretor', function() {return view('cadastro.diretor');})->name('cadastroDiretor');
Route::post('/cadastro/diretor', [DiretorController::class, 'cadastrar']);

Route::get('/login', function(){return view('login');})->name('login');
Route::post('/login', [UsrController::class, 'logar']);
Route::get('/logout', [UsrController::class, 'logout'])->name('logout');


Route::middleware(['auth', TipoUserController::class])->group(function () {
    Route::get('/usuario/{id_usuario}/edit', [UsrController::class, 'edit'])->name('editUser');
    Route::put('/usuarios/{id_usuario}', [UsrController::class, 'update'])->name('updtUser');
    Route::get('/show/salas', [CadastrosController::class, 'index'])->name('ShowSalas');
    Route::get('/show/equipamentos', [CadastrosController::class, 'showEquip'])->name('ShowEquipamentos');
    
    
    //Rotas específicas prefeitura
    Route::get('/cadastro/salas', function () {return view('cadastro.salas');})->name('PrefCadastroSalas');
    Route::post('/cadastro/salas', [CadastrosController::class, 'cadastroSala']);

    //Rotas específicas Diretor
    Route::get('/cadastro/equipamentos', function () {return view('cadastro.equipamentos');})->name('DirCadastroEquipamentos');
    Route::post('/cadastro/equipamentos', [CadastrosController::class, 'cadastrarEquipamento']);
});