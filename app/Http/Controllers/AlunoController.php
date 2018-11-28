<?php

namespace App\Http\Controllers;

use App\Model\Administrador;
use App\Model\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $alunos = Aluno::all();
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
        $aluno->delete();
        return response()->json('Aluno removido com sucesso!');
    }

}