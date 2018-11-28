<?php

namespace App\Http\Controllers;

use App\Model\Administrador;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logar(Request $request){
        $adm = Administrador::where('email', '=', $request->email)->where('senha', '=', $request->senha)->first();
        if (is_null($adm)){
            return response()->json('Administrador não encontrado', 404);
        }
        return response()->json($adm);
    }
}