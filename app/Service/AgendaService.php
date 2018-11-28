<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Professor;

class AgendaService
{
    public function verificarDisponibilidade(Agenda $agenda){
        $total = Agenda::where('dia_semana', '=', $agenda->dia_semana)
            ->where('hora', '=', $agenda->hora)
            ->where('professor_id', '=', $agenda->professor_id)
            ->count();
        if ($total < 4) {
            $agenda->save();
            return response()->json($agenda);
        }
        return response()->json('Limite máximo de alunos no horário desejado excedido.', 404);
    }

    public function addProfessorAluno(){
        $agenda = Agenda::all();
        if ($agenda != null) {
            foreach ($agenda as $item) {
                $item->professor = Professor::find($item->professor_id);
                $item->aluno = Aluno::find($item->aluno_id);
            }
        }
        return response()->json($agenda);
    }
}