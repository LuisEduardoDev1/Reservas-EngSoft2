<?php

namespace App\Http\Controllers;

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
        return redirect()->route('reservas')->with('success', 'Sala cadastrada com sucesso!');
    }

    public function index()
    {
        $salas = Salas::all();
        return view('salasDisp', compact('salas'));
    }
}
