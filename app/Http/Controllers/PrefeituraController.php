<?php

namespace App\Http\Controllers;

use App\Models\Prefeitura;
use Illuminate\Http\Request;

class PrefeituraController extends Controller
{
    //

    public function cadastrar(Request $request) {
        $s1 = $request->senha;
    
        // Criação de um novo registro para a prefeitura
        $register = new Prefeitura();
    
        // Preenche os dados do usuário
        $register->nome_prefeitura = strtoupper($request->nome_prefeitura);
        $register->cnpj_prefeitura = $request->cnpj_prefeitura;
        $register->cidade = strtoupper($request->cidade);
        $register->telefone = $request->telefone;
        $register->email = $request->email;
        $register->senha = $s1; 
    
        // Salva o registro
        $register->save();
        
        // Redireciona para a página de login
        return redirect()->route('login');
    }
    
}
