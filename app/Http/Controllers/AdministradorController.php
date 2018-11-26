<?php

namespace App\Http\Controllers;

use App\Model\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function cadastrar(Request $request, Administrador $adm){
        $adm = Administrador::create($request->all());
        return response()->json($adm);
    }

    public function editar(Request $request, $id){
        $adm = Administrador::find($id);
        $adm->nome = $request->input('nome');
        $adm->email = $request->input('email');
        $adm->senha = $request->input('senha');
        return response()->json($adm);
    }

    public function buscar($id){
        $adm = Administrador::find($id);
        return response()->json($adm);
    }

    public function deletar($id){
        $adm = Administrador::find($id);
        $adm->delete();
        return response()->json('Administrador removido com sucesso!');
    }

}