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
        $register->serialNum = $request->campoSNumber;
        $register->marca = $request->campoMarca;
        $register->descricao = $request->campoDescricao;

        $register->save();
        return redirect()->route('DirCadastroEquipamentos')->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $equipamento = Equipamentos::findOrFail($id);
        return view('edit.equip', compact('equipamento'));
    }

    public function update(Request $request, $id)
    {
        $equipamento = Equipamentos::findOrFail($id);
    
        $equipamento->marca = $request->campoMarca;
        $equipamento->descricao = $request->campoDescricao;

        $equipamento->update($request->all());

        return redirect()->route('DirEditEquipamentos', $equipamento->id_equipamentos)->with('success', 'Equipamento atualizado com sucesso!');
    }
}
