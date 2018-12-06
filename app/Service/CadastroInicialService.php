<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Controle;
use App\Model\Horario;
use App\Model\Professor;
use App\Model\Semana;

class CadastroInicialService
{

    private $horarioService;
    private $semanaService;
    private $professorService;
    private $controleService;

    public function __construct(
        SemanaService $semanaService,
        HorarioService $horarioService,
        ProfessorService $professorService,
        ControleService $controleService) {
        $this->horarioService = $horarioService;
        $this->semanaService = $semanaService;
        $this->professorService = $professorService;
        $this->controleService = $controleService;
    }

    public function cadastroInicial() {
        $controle = Controle::where('nome', '=', 'cadastro-inicial')->where('concluido', '=', true)->first();
        if ($controle === null) {
            $this->semanaService->cadastroInicial();
            $this->horarioService->cadastroInicial();
            $this->professorService->cadastroInicial();
            $this->controleService->cadastroInicial();
            return response()->json('Cadastro efetuado com sucesso!');
        } else {
            return response()->json('Cadastro já existente!', 401);
        }
    }
}