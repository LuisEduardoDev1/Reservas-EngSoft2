<?php

namespace App\Http\Controllers;

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

    public function cadastrar(Request $request){
        $s1 = $request->campoSenha;
        $s2 = $request->campoConfirmSenha;
        if (!$this->comparaSenhas($s1, $s2)){
            return redirect()->route('cadastro')->withInput()->with("error", "Senhas diferentes. Verifique os dados inseridos.");
        }

        $register = new User;

        $register->primeiro_nome = strtoupper($request->campoPrimNome);
        $register->sobrenome = strtoupper($request->campoSobrenome);
        $register->email = $request->campoEmail;
        $register->senha = $request->campoSenha;
        $register->email = $request->campoEmail;
        $register->cpf = $request->campoCpf;

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
            return redirect()->route('reservas');
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
        // Validação dos dados
        // $request->validate([
        //     'nome' => 'required|string|max:100',
        //     'email' => 'required|email|max:255' . $id_usuario,
        //     'campoVinculo' => 'required|in:professor,aluno',
        //     'matricula' => 'required|string|max:20',
        //     'curso' => 'nullable|string|max:100',
        //     'campoSenha' => 'nullable|string|min:8',
        // ]);
        // Encontrar o usuário pelo ID
        $usuario = User::findOrFail($id_usuario);
        
        // Atualizar os campos do usuário
        $usuario->primeiro_nome = strtoupper($request->campoPrimNome);
        $usuario->sobrenome = strtoupper($request->campoSobrenome);
        $usuario->email = $request->input('campoEmail');
        $usuario->cpf = $request->input('campoCpf');
        
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

        return redirect()->route('reservas')->with('success', 'Usuário atualizado com sucesso!');
    }
}
