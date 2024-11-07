<?php

namespace App\Http\Controllers;

use App\Models\ReservaProf;
use App\Models\ReservaProRei;
use App\Models\Salas;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    function profReserva(){
        $salas = Salas::all();
        return view('reservas.professor', compact('salas'));
    }

    function profStore(Request $request){
        $register = new ReservaProf();

        $register->id_sala = $request->campoSala;
        $register->data = $request->campoData;
        $register->horario_inicio = $request->campoHoraIni;
        $register->horario_fim = $request->campoHoraFim;
        $register->descricao = $request->campoDescricao;
        $register->id_professor = auth()->User()->primeiro_nome;
        $register->status = 'aguardando aprovação';


        $register->save();

        return redirect()->back()->with('success', 'Reserva solicitada, aguarde a autorização da Prefeitura!');
    }


    function proReiReserva(){
        $salas = Salas::all();
        return view('reservas.proReitoria', compact('salas'));
    }

    function proReiStore(Request $request){
        $register = new ReservaProRei();

        $register->id_sala = $request->campoSala;
        $register->data = $request->campoData;
        $register->horario_inicio = $request->campoHoraIni;
        $register->horario_fim = $request->campoHoraFim;
        $register->descricao = $request->campoDescricao;
        $register->id_professor = auth()->User()->id_usuario;
        $register->status = 'aprovado';


        $register->save();

        return redirect()->back()->with('success', 'Parabéns! Sua reserva foi aprovada com sucesso.');
    }

    public function showReservas(){
        $reservas = ReservaProf::where('status', 'aguardando aprovação')->get();
        return view('reservas.aguardando', compact('reservas'));
    }

    public function aceitarReserva($id){
        $reserva = ReservaProf::findOrFail($id);
        $reserva->status = 'aprovado';
        $reserva->save();
        return redirect()->route('PreReservaSalas')->with('success', 'Reserva aprovada com sucesso!');
    }

}
