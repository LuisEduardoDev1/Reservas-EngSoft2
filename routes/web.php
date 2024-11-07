<?php

use App\Http\Controllers\CadastrosController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\PrefeituraController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ReservaController;
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
Route::post('/cadastro/proReitura', [UsrController::class, 'cadastrar']);

Route::get('/cadastro/prefeitura', function() {return view('cadastro.prefeitura');})->name('cadastroPrefeitura');
Route::post('/cadastro/prefeitura', [UsrController::class, 'cadastrar']);

Route::get('/cadastro/diretor', function() {return view('cadastro.diretor');})->name('cadastroDiretor');
Route::post('/cadastro/diretor', [UsrController::class, 'cadastrar']);

Route::get('/login', function(){return view('login');})->name('login');
Route::post('/login', [UsrController::class, 'logar']);
Route::get('/logout', [UsrController::class, 'logout'])->name('logout');

Route::get('/show/salas', [CadastrosController::class, 'index'])->name('ShowSalas');
Route::get('/show/equipamentos', [CadastrosController::class, 'showEquip'])->name('ShowEquipamentos');

Route::middleware(['auth', TipoUserController::class])->group(function () {
    Route::get('/usuario/{id_usuario}/edit', [UsrController::class, 'edit'])->name('editUser');
    Route::put('/usuarios/{id_usuario}', [UsrController::class, 'update'])->name('updtUser');


    //Rotas específicas pro reitoria
    Route::get('/reserva/pro_reitoria', [ReservaController::class, 'proReiReserva'])->name('ProReiReservaSalas');
    Route::post('/reserva/pro_reitoria', [ReservaController::class, 'proReiStore']);

    //Rotas específicas professor
    Route::get('/reserva/professor', [ReservaController::class, 'profReserva'])->name('ProReservaSalas');
    Route::post('/reserva/professor', [ReservaController::class, 'profStore']);
    
    //Rotas específicas prefeitura
    Route::get('/cadastro/salas', function () {return view('cadastro.salas');})->name('PreCadastroSalas');
    Route::post('/cadastro/salas', [CadastrosController::class, 'cadastroSala']);
    Route::get('/reserva/aguardo', [ReservaController::class, 'showReservas'])->name('PreReservaSalas');

    //Rotas específicas Diretor
    Route::get('/cadastro/equipamentos', function () {return view('cadastro.equipamentos');})->name('DirCadastroEquipamentos');
    Route::post('/cadastro/equipamentos', [EquipamentosController::class, 'cadastrarEquipamento']);
    Route::get('/reserva/diretor', function () {return view('reservas.diretor');})->name('DirReservaSalas');
});

Route::get('/equipamentos/{id}/edit', [EquipamentosController::class, 'edit'])->name('DirEditEquipamentos');
Route::put('/equipamentos/{id}', [EquipamentosController::class, 'update'])->name('DirAtualizaEquipamentos');
Route::delete('/equipamentos/{id}', [EquipamentosController::class, 'destroy'])->name('DirDestroyEquipamentos');
