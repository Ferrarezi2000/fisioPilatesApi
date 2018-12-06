<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logar(Request $request){
        $adm = Professor::where('senha', '=', $request->senha)->first();
        if (is_null($adm)){
            return response()->json('Senha incorreta', 401);
        }
        return response()->json($adm);
    }
}