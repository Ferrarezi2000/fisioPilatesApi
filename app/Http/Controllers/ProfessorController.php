<?php

namespace App\Http\Controllers;

use App\Model\Administrador;
use App\Model\Aluno;
use App\Model\Professor;
use App\Service\ProfessorService;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

    private $professorService;

    public function __construct(ProfessorService $professorService) {
        $this->professorService = $professorService;
    }

    public function listar(){
        return $this->professorService->lista();
    }

    public function cadastrar(Request $request, Professor $professor){
        $professor = Professor::create($request->all());
        return response()->json($professor);
    }

    public function editar(Request $request, $id){
        $professor = Professor::find($id);
        $professor->nome = $request->input('nome');
        return response()->json($professor);
    }

    public function buscar($id){
        $professor = Professor::find($id);
        return response()->json($professor);
    }

    public function deletar($id){
        $professor = Professor::find($id);
        $professor->delete();
        return response()->json('Professor(a) removido com sucesso!');
    }

}