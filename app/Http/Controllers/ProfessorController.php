<?php

namespace App\Http\Controllers;

use App\Model\Administrador;
use App\Model\Aluno;
use App\Model\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function listar(){
        $professores = Professor::all();
        return response()->json($professores);
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