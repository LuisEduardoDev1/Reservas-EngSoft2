<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Salas;
use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    //

    public function verificaSala($sala){
        $verifica = Salas::where('numero', $sala)->first();
        return $verifica; 
    }

    public function cadastroSala(Request $request){
        $register = new Salas;

        if($this->verificaSala($request->campoNumero)){
            return redirect()->back()->with('error', 'Sala ja cadastrada!');
        }

        $register->numero = $request->campoNumero;
        $register->quantidade = $request->campoQtd;
        $register->tamanho = $request->campoTamanho;

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
        $register->quantidade = $request->input('campoSNumber');
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

    public function showEquip(){
        $equipamentos = Equipamentos::all();
        return view('equipDisp', compact('equipamentos'));
    }
    
    
}
