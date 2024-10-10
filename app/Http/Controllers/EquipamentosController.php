<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    //
    public function cadastrarEquipamento(Request $request){
        $register = new Equipamentos;
        
        $register->nome = $request->campoEquipamento;
        $register->quantidade = $request->campoQtd;
        $register->marca = $request->campoMarca;
        $register->descricao = $request->campoDescricao;

        $register->save();
        return redirect()->route('DirCadastroEquipamentos')->with('success', 'Equipamento cadastrado com sucesso!');
    }
}
