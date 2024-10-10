<?php

namespace App\Http\Controllers;

use App\Models\Prefeitura;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Session;

class UsrController extends Controller
{
    function comparaSenhas($senha1, $senha2){
        if ($senha1 == $senha2){
            return true;
        }else{
            return false;
        }
    }

    
    public function verificaCPF($cpf)
    {
        $user = User::where("cpf", $cpf)->first();

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

        // if (!$this->verificaCPF($request->campoCpf)) {
        //     return redirect()->route('cadastro')->withInput()->with("error", "CPF já cadastrado em nosso sistema.");
        // }

        $register = new User;

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

    public function logar(Request $request){
        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);

        $user = User::where("email", $request->email)->first();

        if(!$user){
            return redirect()->back()->withInput()->with("error", "Erro no login. Verifique os dados inseridos.");
        }

        if($request->senha == $user->senha){
            Auth::login($user, true);
            return redirect()->route('inicio');
        }

        return redirect()->route("login")->withInput()->with("error", "Erro no login. Verifique os dados inseridos.");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('login'));
    }


    public function edit($id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        return view('editUser', compact('usuario'));
    }
    public function update(Request $request, $id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        
        // Atualizar os campos do usuário
        $usuario->primeiro_nome = strtoupper($request->campoPrimNome);
        $usuario->sobrenome = strtoupper($request->campoSobrenome);
        $usuario->email = $request->input('campoEmail');
        
        // Atualizar a senha se fornecida
        if ($request->filled('campoSenha')) {
            $s1 = $request->input('campoSenha');
            $s2 = $request->input('campoConfirmSenha');
            if (!$this->comparaSenhas($s1, $s2)) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Senhas diferentes. Verifique os dados inseridos.');
            }
            $usuario->senha = $request->input('campoSenha');
        }

        $usuario->save();

        return redirect()->route('inicio')->with('success', 'Usuário atualizado com sucesso!');
    }
}
