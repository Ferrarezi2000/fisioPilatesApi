<?php

namespace App\Http\Controllers;

use App\Model\Horario;
use App\Service\HorarioService;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    private $horarioService;

    public function __construct(HorarioService $horarioService) {
        $this->horarioService = $horarioService;
    }

    public function listar(){
        return $this->horarioService->joinHorario();
    }

    public function cadastrar(){
        return $this->horarioService->cadastroInicial();
    }

    public function editar(Request $request, $id){
        $horario = Horario::find($id);
        $horario->hora = $request->input('hora');
        $horario->vagas = $request->input('vagas');
        $horario->semana_id = $request->input('semana_id');
        return response()->json($horario);
    }

    public function buscar($id){
        $horario = Horario::find($id);
        return response()->json($horario);
    }

    public function deletar($id){
        $horario = Horario::find($id);
        $horario->delete();
        return response()->json('Horario removido com sucesso!');
    }

}