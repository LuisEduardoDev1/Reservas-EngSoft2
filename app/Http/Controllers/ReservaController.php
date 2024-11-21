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

    public function verificarReservaProf($ini, $fim, $sala, $data){
        $verifica = ReservaProf::where('id_sala', $sala)
        ->where('data', $data)
        ->where(function($query) use ($ini) {
            $query->whereTime('horario_inicio', '<=', $ini)
                  ->whereTime('horario_fim', '>=', $ini);
        })->orWhere(function($query) use ($fim) {
            $query->whereTime('horario_inicio', '<=', $fim)
                  ->whereTime('horario_fim', '>=', $fim);
        })   
        ->where('status', 'aprovado')->first();

        return $verifica;        
    }

    public function verificarReservaProRei($ini, $fim, $sala, $data){
        $verifica = ReservaProRei::where('id_sala', $sala)
        ->where('data', $data)
        ->where(function($query) use ($ini) {
            $query->whereTime('horario_inicio', '<=', $ini)
                  ->whereTime('horario_fim', '>=', $ini);
        })->orWhere(function($query) use ($fim) {
            $query->whereTime('horario_inicio', '<=', $fim)
                  ->whereTime('horario_fim', '>=', $fim);
        })->where('status', 'aprovado')->first();

        return $verifica;        
    }

    function profStore(Request $request){
        $register = new ReservaProf();

        if($this->verificarReservaProf($request->campoHoraIni, $request->campoHoraFim, $request->campoSala, $request->campoData)){
            return redirect()->back()->with('error', 'Sala ocupada nesse horário!');
        }
        if($this->verificarReservaProRei($request->campoHoraIni, $request->campoHoraFim, $request->campoSala, $request->campoData)){
            return redirect()->back()->with('error', 'Sala ocupada nesse horário!');
        }

        $register->id_sala = $request->campoSala;
        $register->data = $request->campoData;
        $register->horario_inicio = $request->campoHoraIni;
        $register->horario_fim = $request->campoHoraFim;
        $register->descricao = $request->campoDescricao;
        $register->id_professor = auth()->User()->id_usuario;
        $register->primeiro_nome = auth()->User()->primeiro_nome;
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

        if($this->verificarReservaProf($request->campoHoraIni, $request->campoHoraFim, $request->campoSala, $request->campoData)){
            return redirect()->back()->with('error', 'Sala ocupada nesse horário!');
        }
        if($this->verificarReservaProRei($request->campoHoraIni, $request->campoHoraFim, $request->campoSala, $request->campoData)){
            return redirect()->back()->with('error', 'Sala ocupada nesse horário!');
        }

        $register->id_sala = $request->campoSala;
        $register->data = $request->campoData;
        $register->horario_inicio = $request->campoHoraIni;
        $register->horario_fim = $request->campoHoraFim;
        $register->descricao = $request->campoDescricao;
        $register->id_pro_reitoria = auth()->User()->id_usuario;
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

    public function minhasReservas(){
        $id = auth()->User()->id_usuario;
        if(auth()->User()->tipo == 2){
            $reservas = ReservaProf::where('id_professor', $id)->get();
            return view('reservas.minhas', compact('reservas'));
        }elseif(auth()->User()->tipo == 4){
            $reservas = ReservaProRei::where('id_pro_reitoria', $id)->get();
            return view('reservas.minhas', compact('reservas'));
        }else {
            $reservas = ReservaProf::where('id_professor', $id)->get();
            return view('reservas.minhas', compact('reservas'));
        }
    }

    public function cancelarReserva($id, Request $request){
        $reserva = ReservaProf::findOrFail($id);
        $reserva->status = 'cancelado';
        $reserva->motivo_cancelamento = $request->motivo_cancelamento;
        $reserva->save();
        return redirect()->route('PreReservaSalas')->with('success', 'Reserva cancelada com sucesso!');
    }

    public function aprovadas(){
        $reservas = ReservaProf::where('status', 'aprovado')->get(); 
        $reservasProRei = ReservaProRei::where('status', 'aprovado')->get();

        return view('reservas.aprovadas', compact('reservas', 'reservasProRei'));
    }

    public function calendario(){
        $reservas = collect(ReservaProf::where('status', 'aprovado')->get());
    $reservasProRei = collect(ReservaProRei::where('status', 'aprovado')->get());

        $eventos = $reservas->map(function ($reserva) {
            return [
                'title' => $reserva->primeiro_nome, // Substitua 'nome' pelo campo desejado
                'start' => $reserva->data,
            ];
        })->merge($reservasProRei->map(function ($reservaProRei) {
            return [
                'title' => 'Pró-Reitoria', // Substitua 'nome' pelo campo desejado
                'start' => $reservaProRei->data,
            ];
        }));
    
        // Envia os eventos para a view
        return view('calendario', compact('eventos'));
    }
}
