<?php

namespace App\Http\Controllers;

use App\Model\Agenda;
use App\Model\Horario;
use App\Model\Semana;
use App\Service\AgendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{

    private $agendaService;

    public function __construct(AgendaService $agendaService) {
        $this->agendaService = $agendaService;
    }

    public function listar(Request $request){
        return $this->agendaService->listaPorDia($request);
    }

    public function listaLivre() {
        return $this->agendaService->agendaLivre();
    }

    public function cadastrar(Request $request){
        return $this->agendaService->efetuarCadastro($request);
    }

    public function buscar($id){
        $agenda = Agenda::find($id);
        return response()->json($agenda);
    }

    public function deletar(Request $request){
        $agenda = Agenda::where('id', '=', $request->id)->first();

        $diaSemana = Semana::where('dia', '=', $agenda->dia_semana)->first();

        $horario = Horario::where('semana_id', '=', $diaSemana->id)->where('hora', '=', $agenda->hora)->first();
        $horario->vagas = $horario->vagas + 1;

        $horario->save();
        $agenda->delete();
        return response()->json('Agenda removida com sucesso!');
    }

}