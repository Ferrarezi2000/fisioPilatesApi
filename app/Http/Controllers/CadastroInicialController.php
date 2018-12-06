<?php

namespace App\Http\Controllers;

use App\Service\CadastroInicialService;

class CadastroInicialController extends Controller
{
    private $cadastroInicialService;

    public function __construct(CadastroInicialService $cadastroInicialService) {
        $this->cadastroInicialService = $cadastroInicialService;
    }

    public function cadastrar(){
       return $this->cadastroInicialService->cadastroInicial();
    }
}