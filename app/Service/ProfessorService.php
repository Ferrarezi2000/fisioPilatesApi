<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Horario;
use App\Model\Professor;
use App\Model\Semana;

class ProfessorService
{
    public function lista(){
        $professores = Professor::all();
        foreach ($professores as $item) {
                $totalAulas = Agenda::where('professor_id', '=', $item->id)->count();
                $item->totalAulas = $totalAulas;
        }
        return response()->json($professores);
    }
}