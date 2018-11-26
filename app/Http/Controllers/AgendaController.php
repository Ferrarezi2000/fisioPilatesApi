<?php

namespace App\Http\Controllers;

use App\Model\Agenda;
use App\Service\AgendaService;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    private $agendaService;

    public function __construct(AgendaService $agendaService) {
        $this->agendaService = $agendaService;
    }

    public function listar(){
        return $this->agendaService->addProfessorAluno();
    }

    public function cadastrar(Request $request, Agenda $agenda){
        $agenda->fill($request->all());
        return $this->agendaService->verificarDisponibilidade($agenda);
    }

    public function editar(Request $request, $id){
        $agenda = Agenda::find($id);
        $agenda->fill($request->all());
        return $this->agendaService->verificarDisponibilidade($agenda);
    }

    public function buscar($id){
        $agenda = Agenda::find($id);
        return response()->json($agenda);
    }

    public function deletar($id){
        $agenda = Agenda::find($id);
        $agenda->delete();
        return response()->json('Agenda removida com sucesso!');
    }

}