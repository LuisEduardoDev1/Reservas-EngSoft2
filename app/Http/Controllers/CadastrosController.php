<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Salas;
use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    //

    public function cadastroSala(Request $request){
        $register = new Salas;

        $register->numero = $request->campoNumero;
        $register->quantidade = $request->campoQtd;

        $register->save();
        return redirect()->route('inicio')->with('success', 'Sala cadastrada com sucesso!');
    }

    public function cadastrarEquipamento(Request $request){
        // Validação
        $request->validate([
            'campoEquipamento' => 'required',
            'campoQtd' => 'required|integer',
            'campoMarca' => 'required|string',
            'campoDescricao' => 'required|string',
        ]);
    
        // Criação do registro
        $register = new Equipamentos;
        $register->nome = $request->input('campoEquipamento');
        $register->quantidade = $request->input('campoQtd');
        $register->marca = $request->input('campoMarca');
        $register->descricao = $request->input('campoDescricao');
        
        $register->save();
    
        return redirect()->route('DirCadastroEquipamentos')->with('success', 'Equipamento cadastrado com sucesso!');
    }
    

    public function index()
    {
        $salas = Salas::all();
        return view('salasDisp', compact('salas'));
    }

    // public function cadastroDatas(){}
}
