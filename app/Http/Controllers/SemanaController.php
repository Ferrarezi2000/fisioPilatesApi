<?php

namespace App\Http\Controllers;

use App\Model\Semana;
use App\Service\SemanaService;
use Illuminate\Http\Request;

class SemanaController extends Controller
{
    private $semanaService;

    public function __construct(SemanaService $semanaService) {
        $this->semanaService = $semanaService;
    }

    public function listar(){
        return $this->semanaService->joinHorario();
    }

    public function cadastrar(){
        return $this->semanaService->cadastroInicial();
    }

    public function editar(Request $request, $id){
        $semana = Semana::find($id);
        $semana->dia = $request->input('dia');
        return response()->json($semana);
    }

    public function buscar($id){
        $semana = Semana::find($id);
        return response()->json($semana);
    }

    public function deletar($id){
        $semana = Semana::find($id);
        $semana->delete();
        return response()->json('Dia removido com sucesso!');
    }

}