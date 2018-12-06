<?php

namespace App\Http\Controllers;

use App\Model\Aluno;
use App\Service\AlunoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    private $alunoService;

    public function __construct(AlunoService $alunoService) {
        $this->alunoService = $alunoService;
    }

    public function listar(){
        $alunos = DB::table('aluno')->orderBy('nome', 'asc')->get();
        return response()->json($alunos);
    }

    public function cadastrar(Request $request, Aluno $aluno){
        $aluno = Aluno::create($request->all());
        return response()->json($aluno);
    }

    public function editar(Request $request, $id){
        $aluno = Aluno::find($id);
        $aluno->nome = $request->input('nome');
        $aluno->observacao = $request->input('data_nascimento');
        return response()->json($aluno);
    }

    public function buscar($id){
        $aluno = Aluno::find($id);
        return response()->json($aluno);
    }

    public function deletar($id){
        $aluno = Aluno::find($id);
        return $this->alunoService->apagar($aluno);
    }

}