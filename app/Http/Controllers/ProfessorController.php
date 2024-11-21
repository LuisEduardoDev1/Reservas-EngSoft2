<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //
    function comparaSenhas($senha1, $senha2){
        if ($senha1 == $senha2){
            return true;
        }else{
            return false;
        }
    }

    
    public function verificaCPF($cpf)
    {
        $user = Professor::where("cpf", $cpf)->first();

        if($user){
            return false;
        }
        return true;
    }
    function validaCPF($cpf) {
        // Retira tudo que não é número.
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se há 11 caracteres
        if (strlen($cpf) != 11) {
            return false;
        }

        # Verifica se há 11 dígitos repetidos
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        #Realiza o cálculo de validação
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
    function limparTexto($tel) {
        return preg_replace('/[^0-9]/', '', $tel);
    }

    public function cadastrar(Request $request){
        $s1 = $request->campoSenha;
        $s2 = $request->campoConfirmSenha;
        if (!$this->comparaSenhas($s1, $s2)){
            return redirect()->route('cadastro')->withInput()->with("error", "Senhas diferentes. Verifique os dados inseridos.");
        }

        if (!$this->verificaCPF($request->campoCpf)) {
            return redirect()->route('cadastro')->withInput()->with("error", "CPF já cadastrado em nosso sistema.");
        }

        $register = new Professor();

        $cpfLimpo = self::limparTexto($request->campoCpf);

        $register->primeiro_nome = strtoupper($request->campoPrimNome);
        $register->sobrenome = strtoupper($request->campoSobrenome);
        $register->email = $request->campoEmail;
        $register->senha = $request->campoSenha;
        $register->email = $request->campoEmail;
        $register->cpf =  $cpfLimpo;

        $register->save();
        
        return redirect()->route('login');
    }
}
